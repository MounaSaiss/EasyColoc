<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Payment;

class DashboardController extends Controller
{
    public  function index()
    {
        $totalUsers = User::Count();
        $totalColocations = Colocation::count();
        $userBanned =User::where('isBanned', 1)->count();
        $totalImpayes = Payment::whereNull('payed_at')->sum('montant');
        $users= User::all();
        return view('admin.adminDashboard', compact('totalUsers', 'totalColocations', 'userBanned','totalImpayes','users'));
    }
}
