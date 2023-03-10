<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
       // dd($any);
        // return view('admin.layouts.mastervue');
        return view('admin.dashboard');
    }
}
