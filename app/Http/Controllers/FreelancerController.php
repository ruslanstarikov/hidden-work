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
        $request->session()->put('freelancer.skills', []);
        $freelancer = Freelancer::where('user_id', $request->user()->id)->first();
        if ($freelancer) {
            $request->session()->put('freelancer.skills', $freelancer->skills->pluck('id')->toArray());
        }

        $selectedSkills = $request->session()->get('freelancer.skills', []);
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
        $skills = $request->session()->get('freelancer.skills', []);
        if ($skills) {
            $freelancer->skills()->sync($skills);
        }
        $request->session()->flash('success', 'Profile updated successfully');
        return view('freelancer.form', ['skills' => $freelancer->skills, 'freelancer' => $freelancer]);
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
