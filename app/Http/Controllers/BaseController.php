<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
		public function index()
		{
			$services = Service::orderBy('name')->get();
			return view('frontend.main', compact('services'));
		}
}
