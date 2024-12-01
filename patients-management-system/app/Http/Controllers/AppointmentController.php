<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Display a listing of appointments
    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor')->get(); // Fetch appointments with relationships
        $patients = Patient::all(); // Fetch all patients
        $doctors = Doctor::all();   // Fetch all doctors

        return view('appointments.index', compact('appointments', 'patients', 'doctors')); // Pass data to the view
    }

    // Store a newly created appointment
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appt_date' => 'required|date',
            'appt_time' => 'required',
        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment added successfully!');
    }

    // Edit an existing appointment
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    // Update an existing appointment
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appt_date' => 'required|date',
            'appt_time' => 'required',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    // Delete an appointment
    public function destroy($id)
    {
        Appointment::findOrFail($id)->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
