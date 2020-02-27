<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operator;
use App\User;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
	public function index()
	{
		$operators = Operator::orderBy('created_at', 'DESC')->get();
		return view('admin.operators.index', compact('operators'));
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'nip' => 'required|numeric|unique:operators,nip',
			'name' => 'required|string',
			'date_of_birth' => 'required|date',
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:4'
		]);

		try {
			$user = User::firstOrCreate([
				'email' => $request->email,
				'password' => bcrypt($request->password)
			]);
			$user->assignRole('operator');

			$file_name = null;

			if ($request->hasFile('photo')) {
				$path = public_path('images/photo');
				$files = $request->photo;
				
				$file_name = time().'.'.$files->getClientOriginalExtension();
				$files->move($path, $file_name);
			}

			$operators = Operator::firstOrCreate([
				'user_id' => $user->id,
				'nip' => $request->nip,
				'name' => $request->name,
				'date_of_birth' => $request->date_of_birth,
				'phone' => $request->phone,
				'address' => $request->address,
				'photo' => $file_name
			]);			

			session()->flash('success', 'Berhasil Menambah Data Operator !');
			return redirect(route('operators.index'));

		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan ! Silahkan Ulangi Kembali.');
			return redirect()->back();
		}
	}

	public function edit($id)
	{
		try {
			$edit = Operator::findOrFail($id);
			$operators = Operator::orderBy('created_at', 'DESC')->get();
			return view('admin.operators.edit', compact('edit', 'operators'));
		} catch (\Exception $e) {
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|string',
			'date_of_birth' => 'required|date',
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'photo' => 'nullable|image|mimes:jpeg,png,jpg',
		]);

		try {
			$nip = '';
			$email = '';
			$password = '';

			$operators = Operator::findOrFail($id);
			if ($request->nip != $operators->nip) {
				$this->validate($request, [
					'nip' => 'required|numeric|unique:operators,nip',
				]);
				$nip = $request->nip;
			} else {
				$nip = $operators->nip;
			}
			if ($request->email != $operators->login->email) {
				$this->validate($request, [
					'email' => 'required|email|unique:users,email',
				]);
				$email = $request->email;
			} else {
				$email = $operators->login->email;
			}
			if ($request->password) {
				$this->validate($request, [
					'password' => 'required|confirmed|min:4'
				]);
				$password = bcrypt($request->password);
			} else {
				$password = $operators->login->password;
			}

			$file_name = null;
			if ($request->hasFile('photo')) {
				if ($operators != null) {
					Storage::disk('photo')->delete('photo/'.$operators->photo);
				}
				$path = public_path('images/photo');
				$files = $request->photo;
				$file_name = time().'.'.$files->getClientOriginalExtension();
				$files->move($path, $file_name);
			}

			$user = User::findOrFail($operators->user_id);
			$user->update([
				'email' => $email,
				'password' => $password,
			]);

			$operators->update([
				'nip' => $nip,
				'name' => $request->name,
				'date_of_birth' => $request->date_of_birth,
				'phone' => $request->phone,
				'address' => $request->address,
				'photo' => $file_name
			]);

			session()->flash('success', 'Data Operator Berhasil di-Ubah !');
			return redirect(route('operators.index'));
		} catch (\Exception $e) {
			dd($e);
			session()->flash('error', 'Terjadi Kesalahan !');
			return redirect()->back();
		}
	}

	public function destroy($id)
	{
		try {
			$operators = Operator::findOrFail($id);
			$user = User::findOrFail($operators->user_id);

			if ($operators->photo != null) {
				Storage::disk('photo')->delete('photo/'.$operators->photo);
			}
			$operators->delete();
			$user->delete();

			session()->flash('success', 'Data Berhasil Di-Hapus !');
			return redirect(route('operators.index'));

		} catch (\Exception $w) {
			session()->flash('Terjadi Kesalahan !');
			return redirect()->back();
		}
	}
	
	public function print()
	{
		# code...
	}
}
