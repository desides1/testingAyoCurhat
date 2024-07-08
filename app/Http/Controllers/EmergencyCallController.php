<?php

namespace App\Http\Controllers;

class EmergencyCallController extends Controller
{
    public function index()
    {
        $title = 'Panggilan Darurat';

        return view('emergency-call.index', compact('title'));
    }
}
