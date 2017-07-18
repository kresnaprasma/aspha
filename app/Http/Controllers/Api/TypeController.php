<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'data'=>$this->transformCollection($types)
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
            'code_type'=> 'required',
            'name' => 'required',
            'merk_id' => 'required'
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

        $type = Type::create($request->all());

        if (!$type) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'Merk Created Succesfully',
                'data' => [$this->transform($type)]
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
        $type = Type::find($id);

        if (!$type) {
            return response()->json([
                'error'=>[
                    'message' => 'Merk does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($type)
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
        $type = Type::find($id);
        $type->update($request->all());
        return response()->json([
            'data'=>$this->transform($type)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        return response()->json([
            'data'=>$this->transform($type)]);
    }

    private function transformCollection($types){
        return array_map([$this, 'transform'], $types->toArray());
    }
 
    private function transform($type){
        return [
           'type_id' => $type['id'],
           'type_name' => $type['name'],
           'type_merk' => $type['merk_id']
        ];
    }
}
