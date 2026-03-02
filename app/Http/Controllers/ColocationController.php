<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColocationRequest;
use App\Mail\InvitationMail;
use App\Models\Category;
use App\Models\Colocation;
use App\Models\Membrship;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ColocationController extends Controller
{
    public function index()
    {
        $colocations = Auth::user()->colocations;
        return view('colocation.index', compact('colocations'));
    }
    public function show(Colocation $colocation)
    {
        $membership = Membrship::where('colocation_id', $colocation->id)
            ->where('user_id', Auth::id())
            ->first();

        if (! $membership || $membership->leftAt !== null) {
            return redirect()->route('colocations.index')->with('error', 'Vous n\'avez pas accès aux détails de cette colocation.');
        }

        if ($colocation->type === 'cancelled') {
            return redirect()->route('colocations.index')->with('error', 'Cette colocation est annulée.');
        }
        $categories = Category::where('colocation_id', $colocation->id)->get();
        $expenses = $colocation->expenses()->with(['payer'])->get();
        $payments = Payment::whereNull('payed_at')
            ->with(['user', 'expense'])
            ->whereRelation('expense', 'colocation_id', $colocation->id)->get();

        return view('colocation.show', compact('colocation', 'categories', 'expenses', 'payments'));
    }

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
            ->route('colocations.show', ['colocation' => $colocation])
            ->with('success', 'Colocation créée avec succès');
    }

    public function cancel(Colocation $colocation)
    {
        $memberships = Membrship::where('colocation_id', $colocation->id)
            ->where('user_id', Auth::id())
            ->where('role', 'owner')
            ->firstOrFail();

        Membrship::where('colocation_id', $colocation->id)
            ->update(['leftAt' => now()]);

        $colocation->update([
            'type' => 'cancelled',
        ]);

        return redirect()->route('colocations.index')->with('success', 'Colocation annulée.');
    }

    public function leave(Colocation $colocation)
    {
        $memberships = Membrship::where('colocation_id', $colocation->id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $memberships->leftAt = now();
        $memberships->save();
        $hasUnpaidPayments = Payment::where('user_id', Auth::id())
            ->whereNull('payed_at')
            ->whereHas('expense', function ($query) use ($colocation) {
                $query->where('colocation_id', $colocation->id);
            })
            ->exists();

        $user = $memberships->user;

        if ($hasUnpaidPayments) {
            $user->reputation = $user->reputation - 1;
            $message = 'Vous avez quitté la colocation. Votre réputation a diminué à cause de paiements non réglés (-1).';
        } else {
            $user->reputation = $user->reputation + 1;
            $message = 'Vous avez quitté la colocation. Félicitations pour avoir réglé tous vos paiements (+1 réputation) !';
        }

        $user->save();

        return redirect()->route('colocations.index')->with('success', $message);
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

        Mail::to($request->email)->send(new InvitationMail($invitation));

        return redirect()->back();
    }

    public function removeUser(Colocation $colocation, User $user)
    {
        $membership = Membrship::where('colocation_id', $colocation->id)
            ->where('user_id', $user->id)
            ->first();
        if ($membership) {
            $membership->update(['leftAt' => now()]);

            // Transfer unpaid payments from the removed user to the owner (the auth user)
            Payment::where('user_id', $user->id)
                ->whereNull('payed_at')
                ->whereHas('expense', function ($query) use ($colocation) {
                    $query->where('colocation_id', $colocation->id);
                })
                ->update(['user_id' => Auth::id()]);
            return redirect()->back()->with('success', 'Utilisateur retiré de la colocation avec succès. Ses paiements non réglés vous ont été transférés.');
        }
        return redirect()->back()->with('error', 'Utilisateur non trouvé dans la colocation');
    }
}
