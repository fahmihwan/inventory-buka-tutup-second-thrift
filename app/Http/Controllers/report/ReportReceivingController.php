<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportReceivingController extends Controller
{
    public function index()
    {
        return view('pages.report.receiving.index');
    }
}
