<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyPatient;
use App\Patient;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index()
    {
        return 'OK';
    }

    public function login()
    {
        $services = Service::orderBy('name')->get();
        return view('frontend.users.login', compact('services'));
    }

    public function register()
    {
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
            $token = md5(now());
            $user = User::firstOrCreate([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => $token
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

            $mail = Mail::to($request->email)->send(new VerifyPatient($user, $token));

            session()->flash('success', 'Berhasil Melakukan Registrasi ! Silahkan Lanjutkan dengan Cara Mengkonfirmasi E-Mail !');
            return redirect(route('user.register'));
        } catch (\Exception $e) {
						dd($e);
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

    public function rawatjalan()
    {
        if(auth()->check() == false) {
            return redirect(route('user.register'));
        }
    }
}
