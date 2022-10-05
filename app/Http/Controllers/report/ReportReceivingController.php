<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Receiving;

use PDF;


class ReportReceivingController extends Controller
{
    public function index()
    {

        $data = Receiving::with(['supplier:id,name', 'category_product:id,name'])
            ->latest()->get();

        return view('pages.report.receiving.index', [
            'receiving_data' => $data,
        ]);
    }
}
