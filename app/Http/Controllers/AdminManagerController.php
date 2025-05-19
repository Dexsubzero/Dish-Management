<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    public function role() {
        return view('adminmanager.dashboard');
    }
}
