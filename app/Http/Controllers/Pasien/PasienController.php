<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use PDF;

class PasienController extends Controller
{
    public function index()
    {
        $patient = Patient::orderBy('created_at', 'DESC')->get();
        $user = User::orderBy('created_at', 'DESC')->get();
        return view('admin.patients.index', compact('patient', 'user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $pasien = Patient::where('id', $id)->get();
        $user = User::where('id', 'user_id');
        // dd($user);
        return view('admin.patients.show', compact('pasien', 'user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function view_print()
    {
        try {
            $pasien = Patient::all();
            return view('admin.patients.viewLaporan', compact('pasien'));
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function print()
    {
        try {
            $pasien = Patient::all();
            $pdf = PDF::loadview('admin.patients.printLaporan', compact('pasien'));
            return $pdf->download('laporan_data_pasien_pdf');

        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
       
    }
}
