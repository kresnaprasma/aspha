<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class CustomerUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.loan.customerupload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.loan.customerupload.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storage $storage, Request $request)
    {
        if ( $request->isXmlHttpRequest() )
        {
            $image = $request->file( 'image' );
            $timestamp = $this->getFormattedTimestamp();
            $savedImageName = $this->getSavedImageName( $timestamp, $image );

            $imageUploaded = $this->uploadImage( $image, $savedImageName, $storage );

            /*$entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;
            $entry->user_id = auth()->user()->id;
            $entry->save();*/

            if ( $imageUploaded )
            {
                $data = [
                    'original_path' => asset( '/images/' . $savedImageName )
                ];
                return json_encode( $data, JSON_UNESCAPED_SLASHES );
            }
            return "uploading failed";
        }
    }

    public function uploadImage($image, $imageFullName, $storage)
    {
        $filesystem = new Filesystem;
        return $storage->disk( 'image' )->put( $imageFullName, $filesystem->get( $image ) );
    }

    public function getFormattedTimestamp()
    {
        return str_replace( [' ', ':'], '-', Carbon::now()->toDateTimeString() );
    }

    protected function getSavedImageName($timestamp, $image)
    {
        return $timestamp . '-' . $image->getClientOriginalName();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $entries = Fileentry::find($id);
        Storage::disk('local')->delete($entries->filename);
        $entries->delete();
        Session::flash('message', 'Succesfully deleted!');
        return redirect('/admin/fileentry'); 
    }
}
