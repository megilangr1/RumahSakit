<?php

namespace App\Http\Controllers\Admin\MasterOperator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operator;
use PDF;

class MainController extends Controller
{
    public function index()
    {
        try {
            $operator = Operator::all();
            return view('admin.operators.viewLaporan', compact('operator'));
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $operator = Operator::all();
            $pdf = PDF::loadview('admin.operators.printLaporan', compact('operator'));
            return $pdf->stream();
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
