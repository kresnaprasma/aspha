<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = Client::all();

    	return response()->json([
    		'data'=>$this->transformCollection($clients)
    	], 200);
    }

    public function store(Request $request)
    {
    	$validator = validator::make($request->all(), [
    		'name' => 'required',
    		'no_ktp' => 'required',
    		'birth_date' => 'required',
    		'handphone' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    	]);

    	if ($validator->fails()) {
    		return response()->json([
    			'status'=>'404',
    			'message'=>$validator->errors(),
    			'data'=>[]
    			], 404
    		);
    	}

    	$client = Client::create($request->all());

    	if (!$client) {
    		return response()->json([
    			'status' => '404',
    			'message' => 'cannot save this data',
    			'data' => []
    		], 404);
    	}else{
    		return response()->json([
    			'status' => '200',
    			'message' => 'Client User Created Successfully',
    			'data' => [$this->transform($client)]
    		], 200);
    	}
    }

    public function show($id)
    {
    	$client = Client::find($id);

    	if (!$client) {
    		return response()->json([
    			'error'=>[
    				'message' => 'Client User does not exist'
    			]
    		], 404);
    	}

    	return response()->json([
    		'data'=>$this->transform($client)
    	], 200);
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
    	$client = Client::find($id);
    	$client->update($request->all());
    	return response()->json([
    		'data'=>$this->transform($client)
    	]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$client = Client::find($id);
    	$client->delete();
    	return response()->json([
    		'data'=>$this->transform($client)
    	]);
    }

    private function transformCollection($client) {
    	return array_map([$this, 'transform'], $clients->toArray());
    }

    private function transform($client) {
    	return [
    		'client_id' => $client['id'],
    		'client_name' => $client['name'],
    		'client_no_ktp' => $client['no_ktp'],
    		'client_address' => $client['address'],
    		'client_post_code' => $client['post_code'],
    		'client_birth_date' => $client['birth_date'],
    		'client_handphone' => $client['handphone'],
    		'client_email' => $client['email'],
    		'client_password' => $client['password']
    	];
    }
}
