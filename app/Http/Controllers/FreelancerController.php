<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Skill;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function freelancerForm()
    {
        return view('freelancer.form');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'bio' => 'required|string',
            'location' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
        ]);

        $freelancer = $request->user()->freelancer;
        if (!$freelancer) {
            $freelancer = new Freelancer();
            $freelancer->user_id = $request->user()->id;
        }

        // Populate the freelancer fields
        $freelancer->full_name = $data['full_name'];
        $freelancer->bio = $data['bio'];
        $freelancer->location = $data['location'];
        $freelancer->website = $data['website'];
        $freelancer->save();

        // Sync the skills with the freelancer
        if (isset($data['skills'])) {
            $skillIds = Skill::whereIn('name', $data['skills'])->pluck('id')->toArray();
            $freelancer->skills()->sync($skillIds);
        }

        return response('Freelancer updated successfully!', 200);
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
}
