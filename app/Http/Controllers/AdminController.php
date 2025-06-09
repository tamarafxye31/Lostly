<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class AdminController extends Controller
{
    public function dashboard()
{
    $stats = [
        'total_lost' => Item::where('status', 'lost')->count(),
        'total_found' => Item::where('status', 'found')->count(),
        'resolved_cases' => Item::where('is_resolved', true)->count(),
        'active_users' => User::where('status', 'active')->count()
    ];

    return view('admin/dashboard', compact('stats'));
}
}