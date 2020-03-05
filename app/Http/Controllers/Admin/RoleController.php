<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles,name'
        ]);

        try {
            $roles = Role::firstOrCreate($request->only('name'));

            session()->flash('success', 'Level Akses Berhasil di-Tambah');
            return redirect(route('roles.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan ! Error Storing Item (Code : xFS01)');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $roles = Role::findOrFail($id);
            $roles->delete();

            session()->flash('success', 'Data Berhasil di-Hapus !');
            return redirect(route('roles.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan !');
            return redirect()->back();
        }
    }
}
