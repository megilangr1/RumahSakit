<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
			$check = Auth::check();
			if ($check) {
				$user = Auth::user();
				if ($user->roles->first()->name == 'admin') {
					return redirect(route('admin.index'));
				} else {
					Auth::logout();
					return redirect(url('/'));
				}
			} else {
				Auth::logout();
				return redirect(url('/'));
			}
    }
}
