<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\User;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::orderBy('created_at', 'DESC');
        return view('admin.doctors.index', compact('doctor'));
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
            'nip' => 'required|numeric|unique:users',
            'name' => 'required|string',
            'date_of_birth' => 'date',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'photo' => 'required', 'image', 'mimes:jpeg,png,jpg,jfif', 'max:5000',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:4',
        ]);

        try {
            $user = User::firstOrCreate($request->only('email', 'password'));
            $user->assignRole('dokter');

            $doctor = Doctor::firstOrCreate([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'name' => $request->nama,
                'date_of_birth' => $request->dob,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => null
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
