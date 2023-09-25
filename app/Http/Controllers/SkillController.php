<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function searchSkills(Request $request, string $domain)
    {
        $query = $request->input('q');
        if(!$query) {
            return response()->json([]);
        }
        $skills = Skill::where('name', 'like', "%$query%")->take(10)->get();

        return view('skills.skills-dropdown', ['skills' => $skills, 'domain' => $domain]);
    }
    public function addSkill(int $id, string $domain, Request $request)
    {
        $selectedSkills = $request->session()->get($domain . ".skills", []);
        if(!in_array($id, $selectedSkills)) {
            $selectedSkills[] = $id;
            $request->session()->put($domain . ".skills", $selectedSkills);
        }
        $skills = Skill::whereIn('id', $selectedSkills)->get();
        return view('skills.top-skill', ['skills' => $skills, 'domain' => $domain]);
    }

    public function removeSkill(int $id, string $domain, Request $request)
    {
        $selectedSkills = $request->session()->get($domain . ".skills", []);
        if (($key = array_search($id, $selectedSkills)) !== false) {
            unset($selectedSkills[$key]);
        }
        $request->session()->put($domain . ".skills", $selectedSkills);
        $skills = Skill::whereIn('id', $selectedSkills)->get();
        return view('skills.top-skill', ['skills' => $skills, 'domain' => $domain]);
    }

    public function currentSkills(string $domain, Request $request)
    {
        $selectedSkills = $request->session()->get($domain . ".skills", []);
        $skills = Skill::whereIn('id', $selectedSkills)->get();

        return view('skills.top-skill', ['skills' => $skills, 'domain' => $domain]);
    }
}
