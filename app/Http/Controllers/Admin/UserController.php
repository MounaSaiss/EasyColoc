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
        $user = Auth::user();
        $expenses = Expense::where('user_idPayer', $user->id)
            ->with(['payer', 'colocation', 'category'])
            ->orderBy('dateAchat', 'desc')
            ->get();
            
        $unpaidAmount = \App\Models\Payment::where('user_id', $user->id)
            ->whereNull('payed_at')
            ->sum('montant');
            
        return view('user.userDashboard', compact('expenses', 'unpaidAmount'));
    }
}
