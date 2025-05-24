<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function create()
    {
        return view('pasien.baru');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required',
        ]);

        $patient = Patient::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        Visit::create([
            'patient_id' => $patient->id,
            'tanggal_kunjungan' => now(),
        ]);

        return redirect()->route('dashboard.pendaftaran')->with('success', 'Pasien baru berhasil didaftarkan.');
    }

    public function pasienLama()
    {
        $patients = Patient::all();
        return view('pasien.lama', compact('patients'));
    }

    public function registrasiPasienLama(Patient $patient)
    {
        Visit::create([
            'patient_id' => $patient->id,
            'tanggal_kunjungan' => now(),
        ]);

        return redirect()->route('dashboard.pendaftaran')->with('success', 'Pasien berhasil diregistrasi ulang!');
    }

    public function edit($id)
    {
        $pasien = Patient::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
        ]);

        $pasien = Patient::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.lama')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function showDetail(Visit $visit)
    {

        $visit->load([
            'patient',
            'checkup',
            'diagnoses',
            'prescriptions.medicine',
        ]);

        return view('pasien.pasien-detail', compact('visit'));
    }
}
