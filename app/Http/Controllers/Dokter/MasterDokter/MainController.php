<?php

namespace App\Http\Controllers\Dokter\MasterDokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CheckUp;
use App\User;
use PDF;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cek = CheckUp::where('doctor_id', '=', $user->dokter->id)->get();

        return view('dokter.Master.index', compact('cek'));
    }

    public function create()
    {
        $user = Auth::user();
        $cek = CheckUp::where('doctor_id', '=', $user->dokter->id)->get();
        $pdf = PDF::loadview('dokter.master.print', compact('cek'));
        return $pdf->stream();
    }
}
