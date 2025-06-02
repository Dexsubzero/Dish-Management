<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadContent()
    {
        return view('admin.partials.transactions'); // This is a Blade file with your transaction card layout
    }
}
