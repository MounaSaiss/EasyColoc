<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use App\Models\Colocation;
use App\Models\User;
use App\Models\Membrship;

class InvitationController extends Controller
{
    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        // dd($invitation->id);
        if ($invitation->status !== 'pending') {
            return redirect()->route('home')
                ->with('error', 'Cette invitation a déjà été traitée.');
        }
        $user = User::where('email', $invitation->email)->first();
        if ($user) {
            $user->colocations()->attach($invitation->colocation_id, [
                'role' => 'member',
                'joinedAt' => now(),
                'leftAt' => null,
            ]);
            $invitation->update(['status' => 'accepted']);
            return redirect()->route('colocation.colocationShow', $invitation->colocation_id)
                ->with('success', 'Invitation acceptée ! Vous êtes maintenant membre de la colocation.');
        } else {
            return redirect()->route('register')->with('invitation_token', $token);
        }
    }

    public function reject($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        if ($invitation->status === 'refused') {
            $invitation->update(['status' => 'refused']);
        }

        $message = ['success', 'Invitation rejetée.'];
        return view('home', compact('message'));
    }
}
