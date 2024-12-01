<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        // Fetch medical records from the database
        $medicalRecords = []; // Replace with actual data fetching logic

        // Pass data to the view (create `resources/views/medical-records/index.blade.php`)
        return view('medical-records.index', compact('medicalRecords'));
    }
}
