<?php

namespace App\Http\Controllers;

use App\Events\InvitationActedOn;
use App\Http\Requests\AcceptInvitationRequest;
use App\Models\CompanyUser;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationsController extends Controller
{
    public const USER_ROLE = 2;
    public function list()
    {
        $user = Auth::user();
        $invitations = Invitation::where('email', $user->email)
            ->with('company')
            ->get();

        return view('invitations.list', ['invitations' => $invitations]);
    }

    public function accept(AcceptInvitationRequest $request, Invitation $invitation)
    {
        $companyId = $invitation->company_id;
        $userId = $request->user()->id;
        $invitation->delete();
        $companyUser = new CompanyUser();
        $companyUser->company_id = $companyId;
        $companyUser->user_id = $userId;
        $companyUser->role_id = self::USER_ROLE;
        $companyUser->save();

        event(new InvitationActedOn($invitation));

        return redirect()->route('invitations.list');
    }

    public function reject(Request $request, Invitation $invitation)
    {
        $invitation->delete();
        event(new InvitationActedOn($invitation));

        return redirect()->route('invitations.list');
    }
}
