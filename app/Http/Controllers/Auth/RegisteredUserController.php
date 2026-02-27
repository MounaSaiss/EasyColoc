<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Invitation;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $role = User::defaultRole();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
        ]);
        event(new Registered($user));
        Auth::login($user);
        if ($request->session()->has('invitation_token')) {
            $token = $request->session()->get('invitation_token');
            $invitation = Invitation::where('token', $token)->first();
            if ($invitation && $invitation->status === 'pending') {
                $user->colocations()->attach($invitation->colocation_id, [
                    'role' => 'member',
                    'joinedAt' => now(),
                    'leftAt' => null,
                ]);
                $invitation->update(['status' => 'accepted']);
                $request->session()->forget('invitation_token');
                return redirect()->route('colocation.colocationShow', $invitation->colocation_id)
                    ->with('success', 'Votre compte a été créé et vous avez rejoint la colocation !');
            }
        }
        return redirect()->route('user.dashboard');
    }
}
