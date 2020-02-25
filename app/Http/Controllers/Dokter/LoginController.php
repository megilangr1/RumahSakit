<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function login()
	{
		if (auth()->check()){
			$user = Auth::user();
			if ($user->roles->first()->name == 'dokter') {
				return redirect(route('dokter.index'));
			} else {
				Auth::logout();
				return view('dokter.auth.login');
			}
		} else {
			return view('dokter.auth.login');
		}
	}

	public function log(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|string'
		]);
		
		try {
			$login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
			if ($login == true) {
				$user = User::where('email', '=', $request->email)->firstOrFail();
				if ($user->roles->first()->name == 'dokter') {
					$log = Auth::loginUsingId($user->id, TRUE);
					return redirect(route('dokter.index'));
				} else {
					session()->flash('fail', 'User Anda Tidak Dapat di-Gunakan !');
					return redirect(route('dokter.login'));
				}
			} else {
				session()->flash('fail', 'E-Mail / Password Salah !');
				return redirect(route('dokter.login'));
			}
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan ! Coba Lagi Dalam Beberapa Saat !');
			return redirect()->back();
		}
	}
}
