<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function index(Request $request)
    {

    }

    public function show(int $id, Request $request)
    {

    }

    public function apply(int $id, Request $request)
    {

    }
    public function form(Request $request)
    {
        $selectedSkills = $request->session()->get('job.skills', []);
        $skills = Skill::whereIn('id', $selectedSkills)->get();

        return view('jobs.form', ['skills' => $skills]);
    }

    public function editForm(Request $request, int $id)
    {
        $job = Job::find($id);
        $job->budget_bitcoin = $job->budget_satoshis / 100000000;
        $skills = $job->skills;
        $selectedSkills = $skills->pluck('id')->toArray();
        $request->session()->put('job.skills', $selectedSkills);

        return view('jobs.form', ['job' => $job, 'skills' => $skills]);
    }
    public function upsert(Request $request, ?int $id = null)
    {
        sleep(3);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scope' => 'required|string',
            'budget_bitcoin' => 'numeric',
        ]);
        $paymentOptions = $request->input('payment_options');
        $budgetSatoshis = $request->input('budget_bitcoin') * 100000000;
        if(!empty($id))
            $job = Job::find($id);
        else
            $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->scope = $request->input('scope');
        $job->budget_satoshis = $budgetSatoshis;
        $job->client_id = Auth::id();
        $job->payment_options = json_encode($paymentOptions);
        $job->save();

        $skills = $request->session()->get('job.skills', []);
        if ($skills) {
            $job->skills()->sync($skills);
        }

        return redirect()->route('jobs.edit', ['id' => $job->id], 303)->with('success', 'Job posted successfully!');
    }

    public function destroy(int $id, Request $request)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect()->route('home', [], 303)->with('success', 'Job deleted successfully!');
    }
}
