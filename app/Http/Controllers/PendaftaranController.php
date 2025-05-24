<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class PendaftaranController extends Controller
{
    public function index()
    {
        $visits = Visit::with('patient')->latest()->paginate(1);
        return view('dashboard.pendaftaran', compact('visits'));
    }
}
