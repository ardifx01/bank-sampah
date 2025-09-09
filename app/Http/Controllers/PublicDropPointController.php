<?php

namespace App\Http\Controllers;

use App\Models\DropPoint;
use Illuminate\Http\Request;

class PublicDropPointController extends Controller
{
    public function index()
    {
        $dropPoints = DropPoint::all();
        return view('drop-points-public.index', compact('dropPoints'));
    }
}