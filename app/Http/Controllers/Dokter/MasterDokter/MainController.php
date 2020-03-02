<?php

namespace App\Http\Controllers\Dokter\MasterDokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CheckUp;
use App\User;
use PDF;

class MainController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user->doctor_id;
            $cek = CheckUp::where('doctor_id', '=', $user->dokter->id)->get();

            return view('dokter.riwayat', compact('cek'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
