<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index()
    {
        return view('components.manageCalendar'); // Blade view file
    }
}
