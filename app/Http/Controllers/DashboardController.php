<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DropPoint;
use App\Models\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            // Jika yang login adalah admin, ambil data statistik
            $totalUsers = User::where('role', 'user')->count();
            $totalDropPoints = DropPoint::count();
            $totalCollections = Collection::count();

            return view('dashboard', [
                'user' => $user,
                'totalUsers' => $totalUsers,
                'totalDropPoints' => $totalDropPoints,
                'totalCollections' => $totalCollections,
            ]);
        } else {
            // Jika yang login adalah user biasa, cukup kirim data user
            return view('dashboard', [
                'user' => $user
            ]);
        }
    }
}