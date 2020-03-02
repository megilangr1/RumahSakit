<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;

class PrintController extends Controller
{
    public function index()
    {
        $regis = Registration::all();
        return view('operator.Master.index', compact('regis'));
    }

    public function create()
    {
        try {
            $regis = Registration::all();
            $pdf = PDF::loadview('Operator.Master.print', compact('regis'));

            return $pdf->download('laporan_pendaftaran_pasien_pdf');
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
}
