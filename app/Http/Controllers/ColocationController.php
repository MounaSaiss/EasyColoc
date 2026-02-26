<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ColocationRequest;
use App\Models\Colocation;
use App\Models\Membrship;
use Illuminate\Support\Facades\Auth;

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
            ->route('colocation.store')
            ->with('success', 'Colocation créée avec succès');
    }
}
