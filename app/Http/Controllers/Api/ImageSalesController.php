<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Response;
use Image;

use App\Uploadsales;

class ImageSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Uploadsales::all();

        return response()->json([
            'data'=>$this->transformCollection($imagemokas)
        ], 200);
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
            'image' => 'required|image|mimes:jpeg, png, jpg, gif, svg| max:2048'  
        ]);

        $file = Input::file('image');
        $mokas_no = $request->input('mokas_no');

        $input = array('image' => $file);
        $mime = array('image' => 'jpeg, png, jpg, gif, pdf, application/vnd.ms-excel' );
        $rules = array( 'image' => 'image');
        $validator = Validator::make($input, $rules, $mime);


        $image = new Uploadsales();
        $image->mime = $file->getClientMimeType();
        $image->original_filename = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $originalNameWithoutExt = substr($image->original_filename, 0, strlen($image->original_filename) - 4);
        
        $image->filename = $this->sanitize($originalNameWithoutExt);
        $image->nameslug = $this->sanitize($image->filename.'.'.$ext);
        $image->slugwithoutExt = $this->sanitize($image->filename);
        $allowedName = $this->createUniqueFilename($image->filename,$ext);
        $filenameExt = $allowedName.'.'.$ext;
        
        $image->mokas_no = $mokas_no;
        $image->save();

        $uploadSuccess = Storage::disk('local')->put('/SalesMokas/'.$filenameExt, File::get($file));


        if ( $validator->fails() )
        {
            return Response::json([
                'success' => false, 
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            return Response::json([
                'success' => true,
                'data' => $image,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Uploadsales::where('nameslug', $id)->first();

        if (!$image) {
            return response()->json([
                'error'=>[
                    'message' => 'Image does not exist'
                ]
            ], 400);
        }

        return response()->json([
            'data'=>$this->transform($image)
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
        $image = Uploadsales::find($id);
        $client->update($request->all());
        return response()->json([
            'data'=>$this->transform($image)
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
        $image = Uploadsales::find($id)->first();
        $filenameExt = $image['nameslug'];
        Storage::disk('local')->delete('/DanaTunai/'. $filenameExt);
        $image->delete();
        return response()->json([
            'data'=>$this->transform($image)
        ]);
    }

    public function getFileTmp($filename)
    {
        $image = Uploadsales::where('filename', '=', $filename)->firstOrFail();
        $file = $this->storage->get('/DanaTunai/'.$filename);

        return(new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

    public function get($filename)
    {
        $entry = Uploadsales::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);

        return(new Response($file, 200))
            ->header('Content-Type', $entry->mime);     
    }

    private function transformCollection($image) {
        return array_map([$this, 'transform'], $image->toArray());
    }

    private function transform($image) {
        return [
            'image_id' => $image['id'],
            'image_original_name' => $image['original_filename'],
            'image_filename' => $image['filename'],
            'image_mime' => $image['mime'],
            'image_nameslug' => $image['nameslug'],
            'image_slugwithoutExt' => $image['slugwithoutExt'],
            'image_mokas_no' => $image['mokas_no']
        ];
    }

    public function createUniqueFilename($filename)
    {
        if (Storage::exists('public/tmp/'.$filename.'.jpg'))
        {
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken;
        }
        return $filename;
    }

    public function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ">", "/", "?");
        //, "."
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}
