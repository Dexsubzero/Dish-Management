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
    public function about(){
        return view('directory.about');
    }
    public function home(){
        return view('dashboard.home');
    }

    public function cart(){
        return view('directory.cart');
    }

    public function checkout(){
        return view('directory.checkout');
    }
}
