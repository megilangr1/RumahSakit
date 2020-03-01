<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;


class MainController extends Controller
{
    public function __construct()
		{
			$this->middleware('auth');
		}

		public function index()
		{
			$id = Role::orderBy('id', 'ASC')->get();
			$roles = Role::find($id);
			return view('admin.main', compact('roles'));
		}
}
