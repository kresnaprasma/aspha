<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use App\Upload;

class UploadController extends Controller
{
    public function index()
    {
    	$imageuploads = Upload::where('user_id', auth()->user()->id)->get();
    	return view('admin.upload.index', compact('imageuploads'));
    }

    public function uploadStore()
    {
    	$imageSave = $request->file('file');
    	$imageName = time().$imageSave->getClientOriginalName();
    	$imageSave->move(public_path('images'), $imageName);

    	$upload = new Upload();
    	$upload->original_name = time().$imageSave->getClientOriginalName();
    	$upload->filename = $imageSave->getFileName();
    	$upload->user_id = auth()->user()->id;
    	$upload->save();

    	return response()->json(['success'=>$imageName]);
    }

    public function get($filename)
    {
    	$upload = Upload::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('images')->get($upload->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

    public function destroy(Request $request, $id)
    {
    	$uploads = Upload::find($id);
    	Storage::disk('images')->delete($uploads->filename);
    	$uploads->delete();
    	$request->session()->flash('message', 'Successfully deleted!');
    	return redirect('/admin/upload');
    }
}
