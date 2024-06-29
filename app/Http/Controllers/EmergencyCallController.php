<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmergencyCallController extends Controller
{
    public function index()
    {
        $title = 'Panggilan Darurat';

        return view('emergency-call.index', compact('title'));
    }
}
