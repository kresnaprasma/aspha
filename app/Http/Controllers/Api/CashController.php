<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Customer;
use App\Leasing;
use App\Cash;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use Auth;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashes = cash::all();

        return response()->json([
            'data'=>$this->transformCollection($cashes)
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

        $cash = cash::create($request->all());

        if (!$cash) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'cash Created Succesfully',
                'data' => [$this->transform($cash)]
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
        $cash = cash::find($id);

        if (!$cash) {
            return response()->json([
                'error'=>[
                    'message' => 'cash does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($cash)
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
        $cash = cash::find($id);
        $cash->update($request->all());
        return response()->json([
            'data'=>$this->transform($cash)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash = cash::where('cash_no', $id)->first();
        $cash->delete();
        return $cash;
    }

    private function transformCollection($cashes){
        return array_map([$this, 'transform'], $cashes->toArray());
    }
 
    private function transform($cash){
        return [
            'cash_id' => $cash['id'],
            'cash_no' => $cash['cash_no'],
            'cash_credit_ceiling_request' => $cash['credit_ceiling_request'],
            'cash_tenor_request' => $cash['merk'],
            'cash_customer_no' => $cash['type'],
            'cash_leasing_no' => $cash['leaisng_no'],
            'cash_branch_id' => $cash['branch_id'],
            'cash_credit_type' => $cash['credit_type'],
            'cash_user_id' => $cash['user_id'],
            'cash_approval' => $cash['approval'],
        ];
    }

    public function getNo()
    {
        $cash = new Cash();
        $cash->id = Uuid::uuid4()->getHex();
        $cash->cash_no = Cash::Maxno();
        $cash->user_id = Auth::guard('api')->user('id');
        $cash->save();

        return $cash;
    }
}
