<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public  function index()
    {
        // Mail::to('hajjvero@gmail.com')->send(new \App\Mail\InvitationMail(new \App\Models\Invitation()));
        $totalUsers = User::Count();
        $totalColocations = Colocation::count();
        $userBanned =User::where('isBanned', 1)->count();
        $totalImpayes = Payment::whereNull('payed_at')->sum('montant');
        $users= User::all();
        return view('admin.adminDashboard', compact('totalUsers', 'totalColocations', 'userBanned','totalImpayes','users'));
    }
}
