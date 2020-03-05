<?php

namespace App\Http\Controllers\Frontend;

use App\CheckUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyPatient;
use App\Patient;
use App\Registration;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class UsersController extends Controller
{
    public function index()
    {
        return 'OK';
    }

    public function login()
    {
				$check = Auth::check();
				if ($check) {
					return redirect(route('user.main'));
				}
        $services = Service::orderBy('name')->get();
        return view('frontend.users.login', compact('services'));
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
					if ($user->roles->first()->name == 'pasien') {
						$log = Auth::loginUsingId($user->id, TRUE);
						return redirect(route('user.main'));
					} else {
						session()->flash('fail', 'User Anda Tidak Dapat di-Gunakan !');
						return redirect(route('user.login'));
					}
				} else {
					session()->flash('fail', 'E-Mail / Password Salah !');
					return redirect(route('user.login'));
				}
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan ! Coba Lagi Dalam Beberapa Saat !');
				return redirect()->back();
			}
		}

    public function register()
    {
				$check = Auth::check();
				if ($check) {
					return redirect(route('user.main'));
				}
        $services = Service::orderBy('name')->get();
        return view('frontend.users.register', compact('services'));
    }

    public function regist(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric|unique:patients,nik',
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        try {
            $user = User::firstOrCreate([
                'email' => $request->email,
								'password' => bcrypt($request->password),
            ]);
            $user->assignRole('pasien');

            $patients = Patient::firstOrCreate([
                'user_id' => $user->id,
                'nik' => $request->nik,
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => null
            ]);

            session()->flash('success', 'Berhasil Melakukan Registrasi !');
            return redirect(route('user.register'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Dalam Beberapa Saat !');
            return redirect()->back();
        }
    }

    public function verifEmail($token)
    {
        try {
            $user = User::where('remember_token', '=', $token)->firstOrFail();
            $user->update([
                'remember_token' => null,
                'email_verified_at' => now()
            ]);
            
            $services = Service::orderBy('name', 'ASC')->get();

            return view('frontend.pages.complete', compact('services'));
        } catch (\Exception $e) {
            return redirect(url('/'));
        }
    }

		public function main()
		{
			$check = Auth::check();
			if ($check) {
				$user = Auth::user();
				if ($user->roles->first()->name != 'pasien') {
					Auth::logout();
					return redirect(route('user.login'));
				} else {
					$services = Service::orderBy('name', 'ASC')->get();
					return view('frontend.users.main', compact('services'));
				}
			} else {
				Auth::logout();
				return redirect(route('user.login'));
			}
		}

    public function rawatjalan()
    {
			$check = Auth::check();
			if (!$check) {
				return redirect(route('user.register'));
			} else {
				$user = Auth::user();
				if ($user->roles->first()->name != 'pasien') {
					Auth::logout();
					return redirect(route('user.register'));
				}
			}

			$services = Service::orderBy('name', 'ASC')->get();
			$user = Auth::user();
			return view('frontend.users.rawatjalan', compact('services', 'user'));
		}

		public function daftarRj(Request $request)
		{
			$this->validate($request, [
				'nik' => 'required|numeric|exists:patients,nik',
				'name' => 'required|string',
				'date_of_birth' => 'required|date',
				'phone' => 'required|numeric',
				'address' => 'required|string',
				'service_id' => 'required|numeric|exists:services,id',
				'regist_date' => 'required|date'
			]);

			if ($request->regist_date < now()->addDay('-1')) {
				session()->flash('fail', 'Tanggal Berobat Tidak Boleh Kurang Dari Hari Ini !');
				return redirect()->back();
			}

			try {
				$user = User::findOrFail(auth()->user()->id);
				$number = time().rand(100, 999).$user->id.rand(0,9);

				$regist = Registration::firstOrCreate([
					'patient_id' => $user->pasien->id,
					'service_id' => $request->service_id,
					'number' => $number,
					'regist_date' => $request->regist_date,
					'expired_date' => date('Y-m-d', strtotime($request->regist_date.'+ 1 days'))
				]);
				
				session()->flash('success', 'Berhasil Mendaftar Rawat Jalan ! Silahkan Tunjukan Kepada Operator / Resepsionis !');
				return redirect(route('code.rawat.jalan', $regist->id));
			} catch (\Exception $e) {
				dd($request->all());
				session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Dalam Beberapa Saat !');				
				return redirect()->back();
			}
		}

		public function code()
		{
			$services = Service::orderBy('name', 'DESC')->get();
			$regist = Registration::orderBy('created_at', 'DESC')->get();
			return view('frontend.users.code', compact('services', 'regist'));
		}

		public function codeDetail($id)
		{
			try {
				$user = Auth::user();
				$regist = Registration::where('id', '=', $id)->where('patient_id', '=', $user->pasien->id)->firstOrFail();
				$services = Service::orderBy('name', 'DESC')->get();
				return view('frontend.users.codeshow', compact('services', 'regist'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}

		public function codeDelete($id)
		{
			try {
				$user = Auth::user();
				$regist = Registration::where('id', '=', $id)->where('patient_id', '=', $user->pasien->id)->firstOrFail();
				$regist->delete();

				session()->flash('success', 'Berhasil Mendaftar Rawat Jalan.');				
				return redirect(route('code.rawat.jalan'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}

		public function history()
		{
			try {
				$user = Auth::user();
				$services = Service::orderBy('name', 'DESC')->get();
				$check = CheckUp::where('patient_id', '=', $user->pasien->id)->get();

				return view('frontend.users.history', compact('check', 'services'));
			} catch (\Exception $e) {
				dd($e);
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}

		public function historyDetail($id)
		{
			try {
				$user = Auth::user();
				$check = CheckUp::where('patient_id', '=', $user->pasien->id)->where('id', '=', $id)->firstOrFail();
				
				$pdf = PDF::loadview('frontend.users.historydetail', compact('check'));
        // return view('frontend.users.historydetail', compact('check'));
				return $pdf->stream();
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan !');
				return redirect()->back();
			}
		}
}
