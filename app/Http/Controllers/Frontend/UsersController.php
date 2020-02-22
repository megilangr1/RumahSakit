<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

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

    public function rawatjalan()
    {
        if(auth()->check() == false) {
            return redirect(route('user.register'));
        }
    }
}
