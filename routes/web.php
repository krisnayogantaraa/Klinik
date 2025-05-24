<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect('/login');
    }

    if ($user->hasRole('pendaftaran')) {
        return redirect()->route('dashboard.pendaftaran');
    }
    if ($user->hasRole('dokter')) {
        return redirect()->route('dashboard.dokter');
    }
    if ($user->hasRole('perawat')) {
        return redirect()->route('dashboard.perawat');
    }
    if ($user->hasRole('apoteker')) {
        return redirect()->route('dashboard.apoteker');
    }

    return redirect('/');
})->middleware(['auth', 'role.redirect'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:pendaftaran'])->group(function () {
    Route::get('/dashboard/pendaftaran', [PendaftaranController::class, 'index'])->name('dashboard.pendaftaran');
    Route::get('/pasien/baru', [PasienController::class, 'create'])->name('pasien.baru');
    Route::post('/pasien/baru', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/lama', [PasienController::class, 'pasienLama'])->name('pasien.lama');
    Route::post('/pasien/lama/registrasi/{patient}', [PasienController::class, 'registrasiPasienLama'])->name('pasien.lama.registrasi');
    Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
});

Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/dashboard/perawat', [PerawatController::class, 'index'])->name('dashboard.perawat');
    Route::get('/checkup/create/{visit}', [CheckupController::class, 'create'])->name('checkup.create');
    Route::post('/checkup/store/{visit}', [CheckupController::class, 'store'])->name('checkup.store');
});

Route::middleware(['auth', 'role:perawat|dokter|apoteker'])->get('/pasien/{visit}/detail', [PasienController::class, 'showDetail'])->name('pasien.detail');

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', [DokterController::class, 'index'])->name('dashboard.dokter');
    
    Route::get('/dokter/diagnosis/{visit}/create', [DokterController::class, 'createDiagnosis'])->name('diagnosis.create');
    Route::post('/dokter/diagnosis/{visit}', [DokterController::class, 'storeDiagnosis'])->name('diagnosis.store');
    Route::delete('/diagnosis/{diagnosis}', [DokterController::class, 'deleteDiagnose'])->name('diagnosis.destroy');

    
});

Route::middleware(['auth', 'role:apoteker'])->group(function () {
    Route::get('/dashboard/apoteker', [ApotekerController::class, 'index'])->name('dashboard.apoteker');
    
    Route::get('/dokter/prescription/{visit}/create', [ApotekerController::class, 'createPrescription'])->name('prescription.create');
    Route::post('/dokter/prescription/{visit}', [ApotekerController::class, 'storePrescription'])->name('prescription.store');
    Route::delete('/prescription/{prescription}', [ApotekerController::class, 'deletePrescription'])->name('prescription.destroy');
    
    Route::resource('medicines', MedicineController::class);
});

require __DIR__ . '/auth.php';
