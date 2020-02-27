<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Support\Facades\Auth;

class DiagnoseController extends Controller
{
  public function add(Request $request)
	{
		$user = Auth::user();
		$cart = Cart::session($user->id);
		$cartItem = $cart->getContent()->count() + 1;
		$id = $user->dokter->id.$request->patient_id.rand(10, 99).$cartItem;

		if ($request->type == 'Diagnosa') {
			if ($request->desc == '') {
				$desc = '';
			} else {
				$desc = $request->desc;
			}

			$add = Cart::session($user->id)->add([
				'id' => $id,
				'name' => $request->name,
				'price' => 0,
				'quantity' => 1,
				'attributes' => [
					'diagnosa' => $request->diagnosa,
					'desc' => $desc
				]
			]);

			$data = [
				'message' => 'Data di-Tambahkan.'
			];
		} else if ($request->type == 'Resep') {
			if ($request->desc == '') {
				$desc = '';
			} else {
				$desc = $request->desc;
			}

			$add = Cart::session($user->id)->add([
				'id' => $id,
				'name' => $request->name,
				'price' => 0,
				'quantity' => 1,
				'attributes' => [
					'medicine_name' => $request->med_name,
					'rules' => $request->rules,
					'medicine_desc' => $desc
				]
			]);

			$data = [
				'message' => 'Data di-Tambahkan.'
			];
		}

		return response()->json($data, 200);
	}

	public function get(Request $request)
	{
		$user = Auth::user();
		$cart = Cart::session($user->id)->getContent();
		return response()->json($cart, 200);
	}
	
	public function delete(Request $request) 
	{
		$user = Auth::user();
		$cart = Cart::session($user->id)->remove($request->id);
		
		$data = [
			'message' => 'Data di-Hapus.'
		];

		return response()->json($data, 200);
	}
}
