<?php

namespace App\Http\Controllers\Admin\MasterDoctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Service::all();
        return view('admin.service.Master.index', compact('poli'));
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
