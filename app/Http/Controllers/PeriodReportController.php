<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporting;
use App\Models\CaseType;
use Carbon\Carbon;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;

class PeriodReportController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Laporan';

        $year = $request->input('year');
        $month = $request->input('month');

        // Semua tahun yang valid
        $validYear = Reporting::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Array bulan dalam bahasa Indonesia
        $bulanArray = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Validasi bulan dan tentukan nama bulan
        if ($month && $month >= 1 && $month <= 12) {
            $monthName = $bulanArray[$month]; // Menentukan nama bulan dari array
        } else {
            $month = date('n'); // Mendapatkan bulan saat ini sebagai angka (1-12)
            $monthName = $bulanArray[$month]; // Menentukan nama bulan berdasarkan bulan saat ini
        }

        // Total pengaduan per jenis kasus
        $caseTypes = CaseType::withCount(['reportings' => function ($query) use ($year, $month) {
            if ($year) {
                $query->whereYear('created_at', $year);
            }

            if ($month) {
                $query->whereMonth('created_at', $month); // Pastikan menggunakan angka bulan untuk query
            }
        }])->get();

        // Mengembalikan view dengan variabel yang sudah diformat
        return view('period-report.index', compact('title', 'caseTypes', 'year', 'monthName', 'validYear', 'bulanArray'));
    }


    public function download(Request $request)
    {
        $title = 'Unduh Laporan';

        $year = $request->input('year');
        $month = $request->input('month');

        if ($year && $month) {
            $period = DateTime::createFromFormat('m', $month)->format('F') . ' ' . $year;
        } elseif ($year) {
            $period = 'Tahun' . $year;
        } else {
            $period = 'Semua Tahun';
        }

        if (($year > now()->year) && ($month < 1 || $month > 12)) {
            return redirect()->route('report.index');
        }

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
