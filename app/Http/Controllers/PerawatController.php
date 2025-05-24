<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class PerawatController extends Controller
{
    public function index()
    {
        $visits = Visit::with('patient')->latest()->paginate(10);
        return view('dashboard.perawat', compact('visits'));
    }

}
