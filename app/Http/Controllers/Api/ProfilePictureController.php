<?php

namespace App\Http\Controllers\Api;

use App\EmployeePicture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as Responses;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Ramsey\Uuid\Uuid;

class ProfilePictureController extends Controller
{
    protected $manager;
    protected $disk;

    public function __construct(ImageManager $manager)
    {
        $this->manager = $manager;
        $this->disk = Storage::disk('local');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ep = EmployeePicture::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile' => 'image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
             return Response::json([
                'error'=>true,
                'message'=>$validator->errors(),
                'code'=> 500
            ], 500);
        }

        $file = $request->file('profile');

        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - 4);
        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename($filename,$ext);
        $filenameExt = $allowed_filename.'.'.$ext;
        
        $image = $this->manager->make($file)->encode($ext)->fit(200);

        $uploadSuccess = Storage::disk('local')->put('/profile/'.$filenameExt, $image->stream());

        if(!$uploadSuccess){
          return Response::json([
            'error'=> true,
            'message' => 'Server error while uploading',
            'code' => 500
          ], 500);
        }

        $ep = new EmployeePicture();
        $ep->id = Uuid::uuid4()->getHex();
        $ep->nip = $request->input('nip');
        $ep->filename = $filenameExt;
        $ep->original_name = $originalName;
        $ep->filetype = $file->getClientMimeType();
        $ep->filesize = $file->getClientSize();
        $ep->save();

        return Response::json([
          'error'=>false,
          'code'=> 200,
          'filename' => $filenameExt,
          'original_name' => $originalName,
          'filetype' => $file->getClientMimeType(),
          'filesize' => $file->getClientSize(),
          'url'=> $ep->id,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upload = EmployeePicture::find($id);

        $file = $this->disk->get('profile/'.$upload->filename);

        return (new Responses($file, 200))
            ->header('Content-Type', $upload->filetype);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ep = EmployeePicture::find($id);

        if(! Storage::exists('profile/'.$ep->filename))
        {
            return false;
        }
    
        Storage::delete('profile/'.$ep->filename);
        $ep->delete();

        return Response::json([
          'error'=>false,
          'code'=> 200,
          'message' => 'delete success '.$ep->filename,
        ], 200);  
    }

    public function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

    public function createUniqueFilename($filename,$ext)
    {
        if (Storage::exists('profile/'.$filename.'.'.$ext))
        {
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken;
        }

        return $filename;
    }
}
