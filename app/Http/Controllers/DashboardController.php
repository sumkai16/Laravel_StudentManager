<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function student()
    {
        return view('dashboard.student');
    }
}
