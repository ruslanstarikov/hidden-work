<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    public function freelancerForm(Request $request)
    {
        $request->session()->put('selectedSkills', []);
        $freelancer = Freelancer::where('user_id', $request->user()->id)->first();
        if ($freelancer) {
            $request->session()->put('selectedSkills', $freelancer->skills->pluck('id')->toArray());
        }

        $selectedSkills = $request->session()->get('selectedSkills', []);
        $skills = Skill::whereIn('id', $selectedSkills)->get();

        return view('freelancer.form', ['skills' => $skills, 'freelancer' => $freelancer]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'about' => 'required|string',
            'portfolio_url' => 'nullable|string|max:2000',
            'rates' => 'nullable|string|max:255',
        ]);

        $freelancer = $request->user()->freelancer;
        if (!$freelancer) {
            $freelancer = new Freelancer();
            $freelancer->user_id = $request->user()->id;
        }

        // Populate the freelancer fields
        $freelancer->name = $data['name'];
        $freelancer->tagline = $data['tagline'];
        $freelancer->about = $data['about'];
        $freelancer->portfolio_url = $data['portfolio_url'];
        $freelancer->hourly_rate = $data['rates'];
        $freelancer->save();
        $skills = $request->session()->get('selectedSkills', []);
        // Sync the skills with the freelancer
        if ($skills) {
            $freelancer->skills()->sync($skills);
        }
        $request->session()->flash('success', 'Profile updated successfully');
        return view('freelancer.form', ['skills' => $freelancer->skills, 'freelancer' => $freelancer]);
    }
    public function searchSkills(Request $request)
    {
        $query = $request->input('q');
        if(!$query) {
            return response()->json([]);
        }
        $skills = Skill::where('name', 'like', "%$query%")->take(10)->get();

        return view('freelancer.skills-dropdown', ['skills' => $skills]);
    }

    public function addSkill(int $id, Request $request)
    {
        $selectedSkills = $request->session()->get('selectedSkills', []);
        if(!in_array($id, $selectedSkills)) {
            $selectedSkills[] = $id;
            $request->session()->put('selectedSkills', $selectedSkills);
        }
        $skills = Skill::whereIn('id', $selectedSkills)->get();
        return view('freelancer.top-skill', ['skills' => $skills]);
    }

    public function removeSkill(int $id, Request $request)
    {
        $selectedSkills = $request->session()->get('selectedSkills', []);
        if (($key = array_search($id, $selectedSkills)) !== false) {
            unset($selectedSkills[$key]);
        }
        $request->session()->put('selectedSkills', $selectedSkills);
        $skills = Skill::whereIn('id', $selectedSkills)->get();
        return view('freelancer.top-skill', ['skills' => $skills]);
    }

    public function currentSkills(Request $request)
    {
        $selectedSkills = $request->session()->get('selectedSkills', []);
        $skills = Skill::whereIn('id', $selectedSkills)->get();

        return view('freelancer.top-skill', ['skills' => $skills]);
    }

    public function getImage(Request $request)
    {
        $freelancer = Freelancer::where('user_id', $request->user()->id)->first();
        if(!$freelancer) {
            return response()->json(null, 404);
        }
        return response()->json($freelancer->profile_picture, 200);
    }

    public function updateImage(Request $request)
    {
//        $request->validate(['profile_picture' => 'required|image|max:2048']);

        $path = $request->file('profile_picture')->store('profile_images');

        $freelancer = $request->user()->freelancer;
        if (!$freelancer) {
            $freelancer = new Freelancer();
            $freelancer->user_id = $request->user()->id;
        }
        $freelancer->profile_picture = $path;
        $freelancer->save();

        return view ('freelancer.profile-picture', ['image' => $path]);
    }
}
