<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ColocationRequest;
use App\Models\Colocation;
use App\Models\Membrship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\InviteUserMail;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\InvitationMail;

class ColocationController extends Controller
{
    public function store(ColocationRequest $request): RedirectResponse
    {
        $activeMembership = Membrship::where('user_id', Auth::id())
            ->whereHas('colocation', function ($query) {
                $query->where('type', 'active');
            })
            ->first();
        if ($activeMembership) {
            return redirect()->back()->with('error', 'Vous êtes déjà membre d\'une colocation active');
        }
        $data = $request->validated();
        $colocation = Colocation::create([
            'name' => $data['name'],
            'type' => 'active',
        ]);
        Membrship::create([
            'user_id' => Auth::id(),
            'colocation_id' => $colocation->id,
            'role' => 'owner',
            'joinedAt' => now(),
            'leftAt' => null,
        ]);
        return redirect()
            ->route('colocation.show', ['colocation' => $colocation->id])
            ->with('success', 'Colocation créée avec succès');
    }
    public function index(Colocation $colocation)
    {
        $expenses = $colocation->expenses()->with(['payer'])->get();
        return view('colocation.colocationShow', compact('colocation', 'expenses'));
    }
    public function list()
    {
        $colocations = Auth::user()
            ->colocations;
        return view('colocation.colocationCreate', compact('colocations'));
    }
    public function cancel(Colocation $colocation)
    {
        $colocation->update([
            'type' => 'cancelled',
        ]);

        return redirect()->route('colocation.list')->with('success', 'Colocation annulée avec succès');
    }
    public function invite(Request $request, Colocation $colocation)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = Str::random(32);
        $invitation = $colocation->invitations()->create([
            'email' => $request->email,
            'token' => $token,
            'status' => 'pending',
        ]);
        // dd($token);  
        Mail::to($request->email)->send(new InvitationMail($invitation));
        return redirect()->back();
    }
    public function removeUser(Colocation $colocation, User $user)
    {
        $membership = Membrship::where('colocation_id', $colocation->id)
            ->where('user_id', $user->id)
            ->first();
        if ($membership) {
            $membership->delete();
            return redirect()->back()->with('success', 'Utilisateur retiré de la colocation avec succès');
        }
        return redirect()->back()->with('error', 'Utilisateur non trouvé dans la colocation');
    }
}
