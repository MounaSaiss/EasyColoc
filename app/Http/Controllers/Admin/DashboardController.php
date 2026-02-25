<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public  function index(){
        $totalUsers=User::Count();
        return view('admin.adminDashboard',compact('totalUsers'));
    }
}
