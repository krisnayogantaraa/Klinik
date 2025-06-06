<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class PendaftaranController extends Controller
{
    public function index()
    {
        $visits = Visit::with(['patient', 'diagnoses'])
                    ->latest()
                    ->paginate(10);
        return view('dashboard.pendaftaran', compact('visits'));
    }
}
