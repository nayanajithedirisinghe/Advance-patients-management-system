<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        // Return a view for the billing page (ensure the view exists)
        return view('billings.index');
    }
}
