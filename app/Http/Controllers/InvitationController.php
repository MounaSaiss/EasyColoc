<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function accept(Request $request, $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
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

            return redirect()->route('colocations.show', $invitation->colocation)
                ->with('success', 'Invitation acceptée ! Vous êtes maintenant membre de la colocation.');
        }

        $request->session()->put('invitation_token', $token);
        return redirect()->route('register');
    }

    public function reject($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        if ($invitation->status !== 'refused') {
            $invitation->update(['status' => 'refused']);
        }

        $message = 'Invitation rejetée';

        return view('welcome', compact('message'));
    }
}
