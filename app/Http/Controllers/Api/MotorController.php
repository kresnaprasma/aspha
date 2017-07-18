<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class MotorController extends Controller
{
	public function index()
	{
		$motors = Motor::all();

		return response()->json([
			'data'=>$this->transformCollection($motors)
			], 200);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'merk' => 'required',
			'type' => 'required',
			'post_name' => 'required',
			'post_price' => 'required',
			'fitur' => 'required',
			'stnk_address' => 'required',
			'condition' => 'required',
			'description' => 'required',
			'status' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json([
				'status' => '404',
				'message' => $validator->errors(),
				'data'=>[]
				],404
			);
		}

		$motor = Motor::create($request->all());

		if (!$type) {
			return response()->json([
				'status'=> '404',
				'message'=> 'cannot save this data',
				'data' => []
			], 404);
		}else{
			return response()->json([
				'status' => '200',
				'message' => 'Motor Created Successfully',
				'data' => [$this->transform($motor)]
			], 200);
		}
	}

	public function show($id)
	{
		$motor = Motor::find($id);

		if (!$motor) {
			return response()->json([
				'error'=>[
					'message' => 'Motor does not exist'
				]
			], 404);
		}

		return response()->json([
			'data'=>$this->transform($motor)
		], 200);
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		$edit = Motor::find($id)->update($request->all());
		return response()->json($edit);
	}

	public function destroy($id)
	{
		Motor::find($id)->delete();
		return response()->json(['done']);
	}

	public function transformCollection($motors) {
		return array_map([$this, 'transform'], $motors->toArray());
	}

	private function transform($motors) {
		return [
			'motor_id'	=> $motor['id'],
			'motor_merk' => $motor['merk'],
			'motor_type' => $motor['type'],
			'motor_post_name' => $motor['post_name'],
			'motor_post_price' => $motor['post_price'],
			'motor_fitur' => $motor['fitur'],
			'motor_stnk_address' => $motor['stnk_address'],
			'motor_condition' => $motor['condition'],
			'motor_description' => $motor['description'],
			'motor_status' => $motor['status']
		];
	}
}