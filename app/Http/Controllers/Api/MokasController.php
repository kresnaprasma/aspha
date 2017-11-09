<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mokas;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MokasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mokas = Mokas::all();

        return response()->json([
            'data'=>$this->transformCollection($mokas)
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

        $mokas = Mokas::create($request->all());

        if (!$mokas) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'Merk Created Succesfully',
                'data' => [$this->transform($mokas)]
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
        $mokas = Mokas::find($id);

        if (!$mokas) {
            return response()->json([
                'error'=>[
                    'message' => 'Merk does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($mokas)
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
        $edit = Mokas::find($id)->update($request->all());
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
        Mokas::find($id)->delete();
        return response()->json(['done']);
    }

    public function transformCollection($mokas){
        return array_map([$this, 'transform'], $mokas->toArray());
    }

    public function transform($mokas){
        return [
            'mokas_id' => $mokas['id'],
            'mokas_no' => $mokas['mokas_no'],
            'merk_id' => $mokas['merk_id'],
            'type_id' => $mokas['type_id'],
            'manufacture_year' => $mokas['manufacture_year'],
            'purchase_price' => $mokas['purchase_price'],
            'selling_price' => $mokas['selling_price'],
            'discount' => $mokas['discount'],
            'stnk' => $mokas['stnk'],
            'bpkb' => $mokas['bpkb'],
            'machine_number' => $mokas['machine_number'],
            'chassis_number' => $mokas['chassis_number'],
            'plat' => $mokas['plat'],
            'kilometers' => $mokas['kilometers'],
            'stnk_due_date' => $mokas['stnk_due_date'],
            'period_tax' => $mokas['period_tax'],
            'note' => $mokas['note'],
            'branch_id' => $mokas['branch_id'],
            'cek_ok' => $mokas['cek_ok'],
            'sales_id' => $mokas['sales_id'],
            'user_id' => $mokas['user_id'],
        ];
    }

}
