<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function products()
    {
        return view('manager.partials.products'); // return only the partial view
    }

    public function orders()
    {
        return view('manager.partials.orders');
    }
}
