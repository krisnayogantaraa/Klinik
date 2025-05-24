<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Checkup;
use App\Models\Diagnosis;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $visits = Visit::with(['patient', 'diagnoses'])
                    ->latest()
                    ->paginate(10);
        return view('dashboard.dokter', compact('visits'));
    }

    public function createDiagnosis(Visit $visit)
    {
        return view('dokter.create-diagnosis', compact('visit'));
    }

    public function storeDiagnosis(Request $request, Visit $visit)
    {
        $request->validate([
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
        ]);

        Diagnosis::create([
            'visit_id' => $visit->id,
            'dokter_id' => auth()->id(),
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('pasien.detail', $visit->id)->with('success', 'Diagnosa berhasil ditambahkan.');
    }

    public function destroyDiagnosis(Diagnosis $diagnosis)
    {
        $visitId = $diagnosis->visit_id;
        $diagnosis->delete();
        return redirect()->route('pasien.detail', $visitId)->with('success', 'Diagnosa berhasil dihapus.');
    }

}
