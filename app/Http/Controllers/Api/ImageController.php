<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
    	$images = Image::all();

    	return response()->json([
    		'data'=>$this->transformCollection($images);
    	], 200);
    }

    public function store(Request $request)
    {
    	$validator = validator::make($request->all(), [
    		'original_name' => 'required',
    		'filename' => 'required',
    	]);

    	if ($validator->fails()) {
    		return response()->json([
    			'status'=>'404',
    			'message'=>$validator->errors(),
    			'data'=>[]
    		], 400);
    	}

    	$images = Image::create($request->all());

    	if (!$validator->fails()) {
    		return response()->json([
    			'status'=>'404',
    			'message'=>'Image saved successfully',
    			'data' => [$this->transform($images)]
    		], 200);
    	}
    }

    public function show($id)
    {
    	$images = Image::find($id);

    	if (!$image) {
    		return response()->json([
    			'error'=>[
    				'message' => 'Image does not exist'
    			]
    		], 400);
    	}

    	return response()->json([
    		'data'=>$this->transform($images)
    	], 200);
    }

    public function edit()
    {
    	//
    }

    public function update()
    {
    	$image = Image::find($id);
    	$client->update($request->all());
    	return response()->json([
    		'data'=>$this->transform($image)
    	]);
    }

    public function destroy($id)
    {
    	$image = Image::find($id);
    	$image->delete();
    	return response()->json([
    		'data'=>$this->transform($image)
    	]);
    }

    private function transformCollection($image) {
    	return array_map([$this, 'transform'], $images->toArray());
    }

    private function transform($image) {
    	return [
    		'image_id' => $image['id'],
    		'image_original_name' => $image['original_name'],
    		'image_filename' => $image['filename'],
    		'image_user_id' => $image['user_id']
    	];
    }
}
