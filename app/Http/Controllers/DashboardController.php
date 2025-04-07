<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.welcome');
    }
    public function services() {
        return view('directory.services');
    }
    public function menu() {
        return view('directory.menu');
    }
    public function contacts() {
        return view('directory.contacts');
        
    }
}
