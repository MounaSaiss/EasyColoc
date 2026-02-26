<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ban(User $user){
        $user->isBanned = true;
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur banni avec succès.');
    }
    public function unban(User $user){
        $user->isBanned=false;
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur débanni avec succès.');
    }
}
