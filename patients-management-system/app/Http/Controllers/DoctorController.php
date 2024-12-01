<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Fetch all doctors from the database
        $doctors = Doctor::all();

        // Return the view and pass the doctors data to it
        return view('doctors.index', compact('doctors'));
    }
}
