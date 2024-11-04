<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporting;
use App\Models\CaseType;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;

class PeriodReportController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Laporan Pengaduan';

        $year = $request->input('year');
        $month = $request->input('month');

        if (($year > now()->year) && ($month < 1 || $month > 12)) {
            return redirect()->route('report.index');
        }

        $years = Reporting::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $caseTypes = CaseType::withCount(['reportings' => function ($query) use ($year, $month) {
            if ($year) {
                $query->whereYear('created_at', $year);
            }

            if ($month) {
                $query->whereMonth('created_at', $month);
            }
        }])->get();

        return view('period-report.index', compact('title', 'caseTypes', 'year', 'month', 'years'));
    }

    public function download(Request $request)
    {
        $title = 'Unduh Laporan Pengaduan';

        $year = $request->input('year');
        $month = $request->input('month');

        if ($year && $month) {
            $period = DateTime::createFromFormat('!m', $month)->format('F') . ' ' . $year;
        } elseif ($year) {
            $period = $year;
        } else {
            $period = 'Semua Tahun';
        }

        // dd($year, $month);

        $caseTypes = CaseType::withCount(['reportings' => function ($query) use ($year, $month) {
            if ($year) {
                $query->whereYear('created_at', $year);
            }
            if ($month) {
                $query->whereMonth('created_at', $month);
            }
        }])->get();

        $pdf = Pdf::loadView('period-report.download', compact('title', 'period', 'caseTypes'));
        return $pdf->stream();
    }
}
