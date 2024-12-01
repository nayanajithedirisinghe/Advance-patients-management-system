<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabReportController extends Controller
{
    public function index()
    {
        // Placeholder data; replace with actual logic to retrieve lab reports
        $labReports = [];

        return view('lab-reports.index', compact('labReports'));
    }
}
