<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Service;
use App\Doctor;
use App\User;
use PDF;
use Carbon\Carbon;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctor = Doctor::orderBy('created_at', 'DESC')->get();
        $service = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.doctors.index', compact('doctor', 'service'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|numeric|unique:doctors,nip',
            'name' => 'required|string',
            'service' => 'required|string',
			'date_of_birth' => 'required|date',
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:4'
        ]);
        // dd($request->all());

        try {
            $user = User::firstOrCreate([
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->assignRole('dokter');

            $file_name = null;

            if ($request->hasFile('photo')) {
				$path = public_path('images/photo');
				$files = $request->photo;
				
				$file_name = time().'.'.$files->getClientOriginalExtension();
				$files->move($path, $file_name);
            }
            
            $doctors = Doctor::firstOrCreate([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'name' => $request->name,
                'service_id' => $request->service,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => $file_name
            ]);
            session()->flash('success', 'Berhasil Menambah Data Dokter !');
            return redirect(route('doctors.index'));
            
        } catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Kembali.');
			return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $edit = Doctor::findOrFail($id);
            $doctor = Doctor::orderBy('created_at', 'DESC')->get();
            $service = Service::orderBy('created_at', 'DESC')->get();
            return view('admin.doctors.edit', compact('edit', 'doctor', 'service'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'service' => 'required|string',
			'date_of_birth' => 'required|date',
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        try {
            $nip = '';
            $email = '';
            $password = '';

            $doctor = Doctor::findOrFail($id);
            if ($request->nip != $doctor->nip) {
                $this->validate([
                    'nip' => 'required|numeric|unique:doctors,nip',
                ]);
                $nip = $request->nip;
            } else {
                $nip = $doctor->nip;
            }
            if ($request->email != $doctor->login->email) {
                $this->validate($request, [
                    'email' => 'required|email|unique:users,email'
                ]);
                $email = $request->email;
            } else {
				$email = $doctor->login->email;
            }
            if ($request->password) {
				$this->validate($request, [
					'password' => 'required|confirmed|min:4'
				]);
				$password = bcrypt($request->password);
			} else {
				$password = $doctor->login->password;
            }
            
            $file_name = null;
            if ($request->hasFile('photo')) {
				if ($doctor != null) {
					Storage::disk('photo')->delete('photo/'.$doctor->photo);
				}
				$path = public_path('images/photo');
				$files = $request->photo;
				$file_name = time().'.'.$files->getClientOriginalExtension();
				$files->move($path, $file_name);
            }
            
            $user = User::findOrFail($doctor->user_id);
			$user->update([
				'email' => $email,
				'password' => $password,
            ]);
            
            $doctor->update([
				'nip' => $nip,
                'name' => $request->name,
                'service_id' => $request->service,
				'date_of_birth' => $request->date_of_birth,
				'phone' => $request->phone,
				'address' => $request->address,
				'photo' => $file_name
			]);
            session()->flash('success', 'Data Dokter Berhasil di-Ubah !');
			return redirect(route('doctors.index'));
        } catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
			$doctor = Doctor::findOrFail($id);
			$user = User::findOrFail($doctor->user_id);

			if ($doctor->photo != null) {
				Storage::disk('photo')->delete('photo/'.$doctor->photo);
			}
			$doctor->delete();
			$user->delete();

			session()->flash('success', 'Data Berhasil Di-Hapus !');
			return redirect(route('doctors.index'));

		} catch (\Exception $w) {
			session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
		}
    }

    public function view_print()
    {
        try {
            $doctor = Doctor::all();
            return view('admin.doctors.viewLaporan', compact('doctor'));
        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
    }

    public function print()
    {
        try {
            $doctor = Doctor::all();
            $pdf = PDF::loadview('admin.doctors.printLaporan', compact('doctor'));
            return $pdf->download('laporan_data_dokter_pdf');

        } catch (\Exception $e) {
            session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
        }
       
    }
}