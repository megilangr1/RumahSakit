<?php

namespace App\Http\Controllers\Frontend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Registration;
use App\Service;
use PDF;

class PrintController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $regist = Registration::where('id', '=', $id)->where('patient_id', '=', $user->pasien->id)->firstOrFail();
        $services = Service::orderBy('name', 'DESC')->get();

        return view('frontend.master.index', compact('services', 'regist'));
    }

    public function create()
    {
        //
    }
}
