<?php

namespace App\Http\Controllers;

use App\Models\hasil_laporan;
use Illuminate\Http\Request;

class HasillaporanController extends Controller
{
    public function index()
    {
        $reports = hasil_laporan::all();
        return view('hasil-laporan', compact('reports'));
    }
}
