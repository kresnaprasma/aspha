<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Response;

use App\CustomerCollateral;
use App\UploadCustomer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
    	$images = UploadCustomer::all();

    	return response()->json([
    		'data'=>$this->transformCollection($images)
    	], 200);
    }

    // public function store(Storage $storage, Request $request)
    // {
    //    if ( $request->isXmlHttpRequest() )
    //     {
    //         $image = $request->file( 'image' );
    //         $timestamp = $this->getFormattedTimestamp();
    //         $savedImageName = $this->getSavedImageName( $timestamp, $image );

    //         $imageUploaded = $this->uploadImage( $image, $savedImageName, $storage );

    //         $entry = new Fileentry();
    //         $entry->mime = $file->getClientMimeType();
    //         $entry->original_filename = $file->getClientOriginalName();
    //         $entry->filename = $file->getFilename().'.'.$extension;
    //         $entry->user_id = auth()->user()->id;
    //         $entry->save();

    //         if ( $imageUploaded )
    //         {
    //             $data = [
    //                 'original_path' => asset( '/images/' . $savedImageName )
    //             ];
    //             return json_encode( $data, JSON_UNESCAPED_SLASHES );
    //         }
    //         return "uploading failed";
    //     }
    // }

    /*{
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

    	$images = UploadCustomer::create($request->all());

    	if (!$validator->fails()) {
    		return response()->json([
    			'status'=>'404',
    			'message'=>'Image saved successfully',
    			'data' => [$this->transform($images)]
    		], 200);
    	}
    }*/

    public function postUpload() 
    {
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array( 'image' => 'image');
        $validator = Validator::make($input, $rules);
        
        if ( $validator->fails() )
        {
            return Response::json([
                'success' => false, 
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            $destinationPath = 'files/';
            $filename = $file->getClientOriginalName();
            Input::file('image')->move($destinationPath, $filename);
            return Response::json([
                'success' => true, 
                'file' => asset($destinationPath.$filename)]);
        }
    }

    // public function post(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'original_name' => 'required',
    //         'filename' => 'required',
    //         'mime' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     if ($validator->passes()) 
    //     {
    //         $input = $request->all();
    //         $input['filename'] = time().'.'.$request->image->getClientOriginalExtension('test');
    //         $request->image->move(public_path('images'), $input['filename']);
    //         UploadCustomer::create($input);
    //         return response()->json(['success'=>'done']);
    //     }
    //     return response()->json(['error'=>$validator->errors()->all()]);
    // }

    public function getServerImagesPage()
    {
        return view('pages.upload-2');
    }

    public function getServerImages()
    {
        $images = Image::get(['original_name', 'filename']);

        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->original_name,
                'server' => $image->filename,
                'size' => File::size(public_path('images/full_size/' . $image->filename))
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }

    public function show($id)
    {
    	$images = UploadCustomer::find($id);

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
    	$image = UploadCustomer::find($id);
    	$client->update($request->all());
    	return response()->json([
    		'data'=>$this->transform($image)
    	]);
    }

    public function destroy($id)
    {
    	$image = UploadCustomer::find($id);
    	$image->delete();
    	return response()->json([
    		'data'=>$this->transform($image)
    	]);
    }

    private function transformCollection($image) {
    	return array_map([$this, 'transform'], $image->toArray());
    }

    private function transform($image) {
    	return [
    		'image_id' => $image['id'],
    		'image_original_name' => $image['original_name'],
    		'image_filename' => $image['filename'],
            'image_mime' => $image['mime'],
    		'image_user_id' => $image['customercollateral_no']
    	];
    }
}
