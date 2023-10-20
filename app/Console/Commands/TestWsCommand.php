<?php

namespace App\Console\Commands;

use App\Events\InvitationEvent;
use App\Models\Invitation;
use Illuminate\Console\Command;
use Pusher\Pusher;

class TestWsCommand extends Command
{
    protected $signature = 'app:test-ws-command';
    protected $description = 'Command description';

    public function handle()
    {
        $this->info("DELETE ONE INVITATION AND REPLACE IT");
        $invitation = Invitation::all()->first();
        $companyId = $invitation->company_id;
        for($x = 0; $x < 2; $x++) {
            $newInvitation = new Invitation();
            $newInvitation->company_id = $companyId;
            $newInvitation->email = fake()->email;
            $newInvitation->created_by = 1;
            $newInvitation->save();
        }
        $newInvitation = new Invitation();
        $newInvitation->company_id = $companyId;
        $newInvitation->email = fake()->email;
        $newInvitation->created_by = 1;
        $newInvitation->save();
        $invitation->delete();
        InvitationEvent::broadcast($companyId);

        $this->info("FINISHED");
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
    }
}
