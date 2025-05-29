<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    public function admin() {
        return view('adminmanager.dashboard');
    }

    public function manager() {
        return view('adminmanager.mgr-dashboard');
    }
}
