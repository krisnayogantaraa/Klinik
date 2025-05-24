<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Checkup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckupController extends Controller
{
    public function create(Visit $visit)
    {
        return view('checkup.create', compact('visit'));
    }

    public function store(Request $request, Visit $visit)
    {
        $request->validate([
            'berat_badan' => 'required|numeric|min:1',
            'tekanan_darah' => 'required|string',
        ]);

        Checkup::create([
            'visit_id' => $visit->id,
            'perawat_id' => Auth::id(),
            'berat_badan' => $request->berat_badan,
            'tekanan_darah' => $request->tekanan_darah,
        ]);

        return redirect()->route('pasien.detail', $visit->patient_id)->with('success', 'Vital sign berhasil ditambahkan.');
    }

    public function edit(Checkup $checkup)
    {
        return view('checkup.edit', compact('checkup'));
    }

    public function update(Request $request, Checkup $checkup)
    {
        $request->validate([
            'berat_badan' => 'required|numeric|min:1',
            'tekanan_darah' => 'required|string',
        ]);
        $checkup->update([
            'berat_badan' => $request->berat_badan,
            'tekanan_darah' => $request->tekanan_darah,
        ]);
        return redirect()->route('pasien.detail', $checkup->visit->id)->with('success', 'Vital sign berhasil diperbarui.');
    }
}
