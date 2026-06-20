<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Exports\SensorExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    // ================= EXCEL =================
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new SensorExport(
                $request->start_date,
                $request->end_date
            ),
            'air-monitoring.xlsx'
        );
    }

    // ================= PDF =================
    public function exportPDF(Request $request)
    {
        $query = SensorData::query();

        if ($request->start_date && $request->end_date) {

            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);

        }

        $datas = $query->latest()->get();

        $pdf = Pdf::loadView(
            'exports.sensor-pdf',
            compact('datas')
        );

        return $pdf->download('air-monitoring.pdf');
    }
}