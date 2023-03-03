<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class MainPagesController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('mainpages.dashboard');
    }

}
