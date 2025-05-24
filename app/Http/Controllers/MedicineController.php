<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('nama_obat')->paginate(10);
        return view('medicine.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
        ]);

        Medicine::create($request->only('nama_obat', 'satuan'));

        return redirect()->route('medicines.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit(Medicine $medicine)
    {
        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
        ]);

        $medicine->update($request->only('nama_obat', 'satuan'));

        return redirect()->route('medicines.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
