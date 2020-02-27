<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        try {
            $service = Service::firstOrCreate($request->only('name', 'description'));

            session()->flash('success', 'Data Berhasil Ditambahkan !');
            return redirect(route('services.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
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
        try {
            $service = Service::orderBy('created_at', 'DESC')->get();
            $edit = Service::findOrFail($id);

            return view('admin.service.edit', compact('service', 'edit'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
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
        try {
            $service = Service::findOrFail($id);

            $service->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            session()->flash('success', 'Data Berhasil Ditambahkan !');
            return redirect(route('services.index'));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            session()->flash('success', 'Data Berhasil di-Hapus !');
            return redirect(route('services.index'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
