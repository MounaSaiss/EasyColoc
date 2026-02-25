<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colocation;

class DashboardController extends Controller
{
    public  function index()
    {
        $totalUsers = User::Count();
        $totalColocations = Colocation::count();
        $userBanned =User::where('isBanned', 1)->count();
        return view('admin.adminDashboard', compact('totalUsers', 'totalColocations', 'userBanned'));
    }
}
