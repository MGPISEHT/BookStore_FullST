<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageMapController extends Controller
{
    //
    public function index()
    {
        return view('components.manageMap'); // Blade view file
    }
}
