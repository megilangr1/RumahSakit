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
            $user = User::firstOrCreate([
                'email' => $request->email,
                'password' => bcrypt($request->password)
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

            Mail::to($user->email)->send(new VerifyPatient($user));

            session()->flash('success', 'Berhasil Melakukan Registrasi ! Silahkan Lanjutkan dengan Cara Mengkonfirmasi E-Mail !');
            return redirect(route('user.register'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Dalam Beberapa Saat !');
            return redirect()->back();
        }
        dd($request->all());
    }

    public function rawatjalan()
    {
        if(auth()->check() == false) {
            return redirect(route('user.register'));
        }
    }
}
