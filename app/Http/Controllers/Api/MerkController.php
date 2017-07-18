<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Merk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merks = Merk::all();

        return response()->json([
            'data'=>$this->transformCollection($merks)
        ], 200);
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
            'name'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                'status'=>'404',
                'message'=>$validator->errors(),
                'data'=>[]
                ], 404
            );
        }

        $merk = Merk::create($request->all());

        if (!$merk) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'Merk Created Succesfully',
                'data' => [$this->transform($merk)]
            ],200);
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
        $merk = Merk::find($id);

        if (!$merk) {
            return response()->json([
                'error'=>[
                    'message' => 'Merk does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($merk)
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
        $edit = Merk::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merk::find($id)->delete();
        return response()->json(['done']);
    }

    private function transformCollection($merks){
        return array_map([$this, 'transform'], $merks->toArray());
    }
 
    private function transform($merk){
        return [
               'merk_id' => $merk['id'],
               'merk' => $merk['name']
            ];
    }
}
