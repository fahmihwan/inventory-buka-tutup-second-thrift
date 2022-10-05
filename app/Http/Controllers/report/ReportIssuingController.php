<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Issuing;
use Illuminate\Http\Request;

class ReportIssuingController extends Controller
{
    public function index()
    {
        $data = Issuing::with([
            'detail_issuings.item.category_brand',
            'detail_issuings.item.category_product',
            'customer'
        ])->get();
        // return $data;


        return view('pages.report.issuing.index', [
            'datas' => $data
        ]);
    }
}
