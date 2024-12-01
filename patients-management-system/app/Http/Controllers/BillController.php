<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        return view('billings.index'); // Just an example of a method
    }
}
