<?php

namespace App\Http\Controllers;

class EmergencyCallController extends Controller
{
    public function index()
    {
        $title = 'Panggilan Darurat';
        $number = '6282139443573';

        return view('emergency-call.index', compact('title', 'number'));
    }
}
