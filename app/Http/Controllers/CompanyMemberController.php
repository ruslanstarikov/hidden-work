<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteToCompanyRequest;
use App\Models\Company;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyMemberController extends Controller
{
    public function index(Company $company)
    {
        $members = $company->users;
        $invitations = $company->invitations;

        return view('company.members.index', ['members' => $members, 'company' => $company, 'invitations' => $invitations]);
    }

    public function edit(Company $company, User $member)
    {
        return view('company.members.edit', compact('company', 'member'));
    }

    /**
     * Update the role of the specified member in the company.
     */
    public function update(Request $request, Company $company, User $member)
    {
        $role = $request->input('role');

        $company->users()->updateExistingPivot($member->id, ['role_id' => $role]);

        return redirect()->route('company.members.index', $company)->with('status', 'Role updated successfully!');
    }

    public function destroy(Company $company, User $member)
    {
        $company->users()->detach($member->id);

        return redirect()->route('company.members.index', $company, 303)->with('status', 'Member removed from company!');
    }

    public function destroyInvite(Company $company, Invitation $invitation)
    {
        $invitation->delete();

        return redirect()->route('company.members.index', $company, 303)->with('status', 'Member removed from company!');
    }

    public function inviteForm(Request $request, Company $company)
    {
        return view('company.members.invite', compact('company'));
    }

    /**
     * Invite a new user to the company by email.
     */
    public function invite(InviteToCompanyRequest $request, Company $company)
    {
        $emails = $request->input('emails');
        foreach($emails as $email)
        {
            if($company->users()->where('email', $email)->exists())
                continue;
            if($company->invitations()->where('email', $email)->first())
                continue;
            $company->invitations()->create(['email' => $email]);
        }

        return redirect()->route('company.members.index', $company, 303)->with('status', 'Invitation sent successfully!');
    }
}
