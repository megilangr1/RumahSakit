<?php

namespace App\Http\Controllers\Dokter;

use App\CheckUp;
use App\Diagnosis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Prescription;
use App\WaitingList;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
  public function index()
	{
		if(Auth::check()) {
			if (Auth::user()->roles->first()->name == 'dokter') {
				$user = Auth::user();
				$wl = WaitingList::where('doctor_id', '=', $user->dokter->id)->orderBy('id', 'ASC')->get();
				return view('dokter.main', compact('wl'));
			} else {
				Auth::logout();
				return redirect(route('dokter.login'));
			}
		} else {
			return redirect(route('dokter.login'));
		}
	}

	public function check($id)
	{
		try {
			$wl = WaitingList::findOrFail($id);
			$user = Auth::user();
			$cart = Cart::session($user->id);
			// dd($cart->getContent());
			return view('dokter.check.show', compact('wl', 'cart'));
		} catch (\Exception $e) {
			dd($e);
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function checked(Request $request)
	{
		try {
			$user = Auth::user();
			$wl = WaitingList::findOrFail($request->wl_id);
			DB::beginTransaction();
			
			$check_up = CheckUp::create([
				'check_date' => $request->check_date,
				'patient_id' => $wl->patient_id,
				'doctor_id' => $wl->doctor_id
			]);

			$temp = Cart::session($user->id);
			foreach ($temp->getContent() as $item1) {
				if ($item1->name == 'Diagnosa '.$wl->pasien->name) {
					$diagnose = Diagnosis::create([
						'check_up_id' => $check_up->id,
						'result' => $item1->attributes->diagnosa,
						'description' => $item1->attributes->desc
					]);
				}

				if ($item1->name == 'Resep Obat '.$wl->pasien->name) {
					$pres = Prescription::create([
						'check_up_id' => $check_up->id,
						'medicine_name' => $item1->attributes->medicine_name,
						'rules' => $item1->attributes->rules,
						'description' => $item1->attributes->medicine_desc
					]);
				}
			}

			$wl->delete();
			$temp->clear();

			DB::commit();

			session('success', 'Pemeriksaan Selesai.');
			return redirect(route('dokter.index'));
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Dalam Beberapa Menit.');
			return redirect()->back();
		}
	}

	public function add()
	{
		//
	}
}
