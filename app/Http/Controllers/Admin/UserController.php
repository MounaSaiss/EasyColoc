<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function ban(User $user)
    {
        $user->isBanned = true;
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur banni avec succès.');
    }
    public function unban(User $user)
    {
        $user->isBanned = false;
        $user->save();
        return redirect()->back()->with('success', 'Utilisateur débanni avec succès.');
    }
    public function listAllExpenses()
    {
        dd("Méthode appelée !");
        // $user = Auth::user();
        // $expenses = Expense::where('user_idPayer', $user->id)
        //     ->with(['payer', 'colocation', 'category'])
        //     ->orderBy('dateAchat', 'desc')
        //     ->get();
        // return view('user.userDashboard', compact('expenses'));
    }
}
