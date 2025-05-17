<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // គេប្រើប្រាស់ Controller ដើម្បីបង្កើត class DashboardController ដែលមានមុខងារបង្ហាញទំព័រដែលមានឈ្មោះ dashboard
    public function dashboard()
    {
        return view('dashboard.dashboard');
        // គេប្រើប្រាស់ view ដើម្បីបង្ហាញទំព័រដែលមានឈ្មោះ dashboard
    }
}
