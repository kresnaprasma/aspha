<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Customercollateral;
use App\Customer;
use App\Leasing;
use Ramsey\Uuid\Uuid;
use Auth;

class CustomerCollateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customercollaterals = CustomerCollateral::all();

        return response()->json([
            'data'=>$this->transformCollection($customercollaterals)
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
            'vehicle_color'=> 'required',
            'vehicle_cc' => 'required',
            'stnk_due_date' => 'required',
            'tenor' => 'required',
            'price_request' => 'required',  
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

        $customercollateral = Customercollateral::create($request->all());

        if (!$customercollateral) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'customercollateral Created Succesfully',
                'data' => [$this->transform($customercollateral)]
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
        $customercollateral = CustomerCollateral::find($id);

        if (!$customercollateral) {
            return response()->json([
                'error'=>[
                    'message' => 'customercollateral does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($customercollateral)
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
        $customercollateral = CustomerCollateral::where('customercollateral_no', $id)->first();
        $customercollateral->delete();
        return $customercollateral;
    }

    private function transformCollection($customercollaterals){
        return array_map([$this, 'transform'], $customercollaterals->toArray());
    }

    private function transform($customercollaterals){
        return [
            'customercollateral_id' => $customercollateral['id'],
            'customercollateral_no' => $customercollateral['customercollateral_no'],
            'customercollateral_stnk' => $customercollateral['stnk'],
            'customercollateral_bpkb' => $customercollateral['bpkb'],
            'customercollateral_machine_number' => $customercollateral['machine_number'],
            'customercollateral_chassis_number' => $customercollateral['chassis_number'],
            'customercollateral_vehicle_color' => $customercollateral['vehicle_color'],
            'customercollateral_vehicle_cc' => $customercollateral['vehicle_cc'],
            'customercollateral_collateral_name' => $customercollateral['collateral_name'],
            'customercollateral_vehicle_date' => $customercollateral['vehicle_date'],
            'customercollateral_stnk_due_date' => $customercollateral['stnk_due_date'],
            'customercollateral_customer_no' => $customercollateral['customer_no'],
        ];
    }

    public function getCollateralNo()
    {
        $customercollateral = new Customercollateral();
        $customercollateral->id = Uuid::uuid4()->getHex();
        $customercollateral->customercollateral_no = Customercollateral::Maxno();
        $customercollateral->save();

        return $customercollateral;
    }
}
