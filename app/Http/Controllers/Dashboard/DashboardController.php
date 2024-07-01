<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reporting;
use App\Models\User;
use App\Charts\DashboardChart;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // jumlah pengaduan
        $reportingCount = Reporting::count();

        // jumlah konseling
        $userMessagesCount = User::role('Tamu Satgas')
            ->whereHas('counseling', function ($query) {
                $query->distinct('user_id');
            })
            ->count();

        return view('dashboard.index', compact('title', 'reportingCount', 'userMessagesCount'));
    }
}
