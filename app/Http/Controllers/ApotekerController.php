<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Checkup;
use App\Models\Diagnosis;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Patient;

class ApotekerController extends Controller
{
    public function index()
    {
        $visits = Visit::with('patient')->latest()->paginate(10);
        return view('dashboard.apoteker', compact('visits'));
    }
    
    public function createPrescription(Visit $visit)
    {
        $medicines = Medicine::all()->paginate(10);
        return view('dokter.create-prescription', compact('visit', 'medicines'));
    }

    public function storePrescription(Request $request, Visit $visit)
    {
        $validated = $request->validate([
            'medicine_id.*' => 'required|exists:medicines,id',
            'jumlah.*' => 'required|integer|min:1',
            'aturan_pakai.*' => 'nullable|string',
        ]);

        foreach ($request->medicine_id as $index => $medicineId) {
            Prescription::create([
                'visit_id' => $visit->id,
                'medicine_id' => $medicineId,
                'jumlah' => $request->jumlah[$index],
                'aturan_pakai' => $request->aturan_pakai[$index],
            ]);
        }

        return redirect()->route('pasien.detail', $visit->id)->with('success', 'Resep berhasil ditambahkan.');
    }

    public function deleteDiagnose(Diagnosis $diagnosis)
    {
        $diagnosis->delete();
        return redirect()->back()->with('success', 'Diagnosa berhasil dihapus.');
    }

    public function deletePrescription(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->back()->with('success', 'Resep obat berhasil dihapus.');
    }
}
