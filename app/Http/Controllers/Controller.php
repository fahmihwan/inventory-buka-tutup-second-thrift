<?php

namespace App\Http\Controllers;

use App\Models\User;
use Clockwork\Request\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnCallback;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // public function create()
    // {
    //     return view('welcome');
    // }
}
