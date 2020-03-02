<?php

namespace App\Http\Controllers\Operator;

use App\Doctor;
use App\Operator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;
use App\WaitingList;
use Illuminate\Support\Facades\Auth;
use PDF;

class MainController extends Controller
{
  public function index()
	{
		if(Auth::check()) {
			if (Auth::user()->roles->first()->name == 'operator') {
				return view('operator.main');
			} else {
				Auth::logout();
				return redirect(route('operators.login'));
			}
		} else {
			return redirect(route('operators.login'));
		}
	}

	public function regist()
	{
		$regist = Registration::orderBy('created_at', 'DESC')->where('status', '=', '0')->get();
		return view('operator.regist.index', compact('regist'));
	}

	public function registDetail($number)
	{
		try {
			$date = date('Y-m-d');
			$regist = Registration::where('number', '=', $number)->where('regist_date', '=', $date)->firstOrFail();
			$doctor = Doctor::where('service_id', '=', $regist->service_id)->get();
			return view('operator.regist.show', compact('regist', 'doctor'));
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function assignWL(Request $request)
	{
		$this->validate($request, [
			'regist_number' => 'required|string|exists:registrations,number',
			'doctor_id' => 'required|string|exists:doctors,id'
		]);

		try {
			$regist = Registration::where('number', '=', $request->regist_number)->firstOrFail();
			$wl = WaitingList::firstOrCreate([
				'patient_id' => $regist->patient_id,
				'service_id' => $regist->service_id,
				'doctor_id' => $request->doctor_id
			]);

			$regist->update([
				'status' => 1
			]);

			session()->flash('success', 'Pasien Di-Pindahkan ke Antrian Dokter.');
			return redirect(route('operator.regist'));
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}
}
