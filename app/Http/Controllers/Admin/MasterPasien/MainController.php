<?php

namespace App\Http\Controllers\Admin\MasterPasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use PDF;

class MainController extends Controller
{
    public function index()
    {
        try {
            $pasien = Patient::all();
            return view('admin.patients.viewLaporan', compact('pasien'));
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $pasien = Patient::all();
            $pdf = PDF::loadview('admin.patients.printLaporan', compact('pasien'));
            return $pdf->stream();
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

}
