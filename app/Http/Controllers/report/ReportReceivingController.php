<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Receiving;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportReceivingController extends Controller
{
    public function index()
    {
        // print
        if (request('print')) {
            $data = Receiving::latest()->filter(request(['start_date', 'end_date']));
            if ($data->count() == 0) {
                return redirect('/report/receiving')->withErrors('Data tanggal ' . request('start_date') . ' sampai ' . request('end_date') . ' tidak ada');
            }
            $pdf = Pdf::loadView('pages.report.receiving.print_date', [
                'datas' => $data->get()
            ]);
            return $pdf->download('report_receiving.pdf');
        }

        // search
        if (request('start_date')) {
            $data = Receiving::latest()->filter(request(['start_date', 'end_date']))->get();
        } else {
            $data = Receiving::with(['supplier:id,name', 'category_product:id,name'])->get();
        }

        return view('pages.report.receiving.index', [
            'datas' => $data,
        ]);
    }
}
