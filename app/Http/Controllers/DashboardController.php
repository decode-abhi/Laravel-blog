<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function customerCreate(){
        return view('customer.dashboard');
    }
    public function adminCreate(){
        return view('admin.dashboard');
    }
}
