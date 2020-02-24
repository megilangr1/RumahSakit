<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\User;
use App\Service;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::orderBy('created_at', 'DESC')->get();
        $service = Service::orderBy('created_at', 'DESC')->get();
        return view('admin.doctors.index', compact('doctor', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|numeric|unique:doctors,nip',
            'nama' => 'required|string',
            'service' => 'required|string',
            'dob' => 'required|date',
            'noHp' => 'required|numeric',
            'address' => 'required|string',
            'photo' => 'required', 'mimes:jpeg,png,jpg',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users,email',
            'password' => 'required', 'string', 'min:4',
        ]);

        try {
            $user = User::firstOrCreate([
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->assignRole('dokter');

            $path = public_path('images/photo');
            $files = $request->photo;
            $file_name = time().'.'.$files->getClientOriginalName();
            $files->move($path, $file_name);
            $input = $request->all();

            Doctor::firstOrCreate([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'name' => $request->nama,
                'service_id' => $request->service,
                'date_of_birth' => $request->dob,
                'phone' => $request->noHp,
                'address' => $request->address,
                'photo' => $file_name
            ]);

            session()->flash('success', 'Data Berhasil Ditambahkan !');
            return redirect(route('doctors'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $doctor = Doctor::orderBy('created_at', 'DESC')->get();
            $service = Service::orderBy('created_at', 'DESC')->get();
            $edit = Doctor::findOrFail($id);

            return view('admin.doctors.edit', compact('doctor', 'edit', 'service'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            if ($request->hasFile('photo')) {
                $path = public_path('images/photo');
                $files = $request->photo;
                $file_name = time().'.'.$files->getClientOriginalName();
                $files->move($path, $file_name);
                $input = $request->all();
            }

            $doctor->update([
                'nip' => $request->nip,
                'name' => $request->nama,
                'service_id' => $request->service,
                'date_of_birth' => $request->dob,
                'phone' => $request->noHp,
                'address' => $request->address,
                'photo' => $file_name
            ]);

            session()->flash('success', 'Data Berhasil Ditambahkan !');
            return redirect(route('doctors.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();

            session()->flash('success', 'Data Berhasil di-Hapus !');
            return redirect(route('doctors.index'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}