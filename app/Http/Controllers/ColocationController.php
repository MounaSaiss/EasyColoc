<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Http\Requests\ColocationRequest;
use App\Models\Colocation;
use App\Models\Membrship;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    public function store(ColocationRequest $request): RedirectResponse
    {
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
