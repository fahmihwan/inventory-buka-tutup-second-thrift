<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportStockController extends Controller
{

    public function index()
    {
        return view('pages.report.stock.index');
    }
}
