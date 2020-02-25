<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WaitingList;
use Illuminate\Support\Facades\Auth;

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
			return view('dokter.check.show', compact('wl'));
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function checked(Request $request)
	{
		dd($request->all());
	}
}
