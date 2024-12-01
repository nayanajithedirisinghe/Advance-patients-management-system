<?php

use App\Http\Controllers\{
    PatientController,
    DoctorController,
    AppointmentController,
    MedicalRecordController,
    LabReportController,
    BillingController,
    ProfileController,
};
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web"
| middleware group. Enjoy building your app!
|
*/

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});
Route::get('/billings', [BillingController::class, 'index'])->name('billings.index');
// Dashboard Page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Resource Routes for Patient Management System
Route::middleware('auth')->group(function () {
    // Patients
    Route::resource('patients', PatientController::class);
    
    // Doctors
    Route::resource('doctors', DoctorController::class);
    
    // Appointments
    Route::resource('appointments', AppointmentController::class);
    
    // Medical Records
    Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical-records.index');
    
    // Lab Reports
    Route::get('/lab-reports', [LabReportController::class, 'index'])->name('lab-reports.index');
    
    // Billing
    Route::get('/billings', [BillingController::class, 'index'])->name('billings.index');

    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Appointments Route Outside Middleware (Optional)
// Route::resource('appointments', AppointmentController::class);

// Include Authentication Routes
require __DIR__ . '/auth.php';
