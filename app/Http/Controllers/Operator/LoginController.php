<?php

namespace App\Http\Controllers\Operator;

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
			if ($user->roles->first()->name == 'operator') {
				return redirect(route('operator.index'));
			} else {
				Auth::logout();
				return view('operator.auth.login');
			}
		} else {
			return view('operator.auth.login');
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
				if ($user->roles->first()->name == 'operator') {
					$log = Auth::loginUsingId($user->id, TRUE);
					return redirect(route('operator.index'));
				} else {
					session()->flash('fail', 'User Anda Tidak Dapat di-Gunakan !');
					return redirect(route('operator.login'));
				}
			} else {
				session()->flash('fail', 'E-Mail / Password Salah !');
				return redirect(route('operator.login'));
			}
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan ! Coba Lagi Dalam Beberapa Saat !');
			return redirect()->back();
		}
	}
}
