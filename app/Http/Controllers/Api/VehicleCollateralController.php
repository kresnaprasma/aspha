<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\VehicleCollateral;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VehicleCollateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $VehicleCollaterals = VehicleCollateral::all();

        return response()->json([
            'data'=>$this->transformCollection($VehicleCollaterals)
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
            'merk_id' => 'required',
            'type_id' => 'required',
            'vehicle_date' => 'required',
            'vehicle_price' => 'required'
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

        $VehicleCollateral = VehicleCollateral::create($request->all());

        if (!$VehicleCollateral) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'VehicleCollateral Created Succesfully',
                'data' => [$this->transform($VehicleCollateral)]
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
        $VehicleCollateral = VehicleCollateral::find($id);

        if (!$VehicleCollateral) {
            return response()->json([
                'error'=>[
                    'message' => 'Vehicle Collateral does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($VehicleCollateral)
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
        $VehicleCollateral = VehicleCollateral::find($id);
        $VehicleCollateral->update($request->all());
        return response()->json([
            'data'=>$this->transform($VehicleCollateral)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $VehicleCollateral = VehicleCollateral::find($id);
        $VehicleCollateral->delete();
        return response()->json([
            'data'=>$this->transform($VehicleCollateral)]);
    }

    private function transformCollection($VehicleCollaterals){
        return array_map([$this, 'transform'], $VehicleColalterals->toArray());
    }
 
    private function transform($VehicleCollateral){
        return [
               'collateral_id' => $VehicleCollateral['id'],
               'merk_id' => $VehicleCollateral['merk_id'],
               'type_id' => $VehicleCollateral['type_id'],
               'vehicle_date' => $VehicleCollateral['vehicle_date'],
               'vehicle_price' => $VehicleCollateral['vehicle_price']
            ];
    }
}
