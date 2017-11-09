<?php

namespace App\Http\Controllers\Api;

use App\Sales;

use App\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::all();

        return response()->json([
            'data'=>$this->transformCollection($sales)
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

        $sales = Sales::create($request->all());

        if (!$sales) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'sales Created Succesfully',
                'data' => [$this->transform($sales)]
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
        $sales = Sales::find($id);

        if (!$sales) {
            return response()->json([
                'error'=>[
                    'message' => 'sales does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($sales)
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
        $sales = Sales::find($id);
        $sales->update($request->all());
        return response()->json([
            'data'=>$this->transform($sales)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales = Sales::where('sales_no', $id)->first();
        $sales->delete();
        return $sales;
    }

    private function transformCollection($sales){
        return array_map([$this, 'transform'], $sales->toArray());
    }
 
    private function transform($sales){
        return [
            'sales_id' => $sales['id'],
            'sales_no' => $sales['sales_no'],
            'sales_credit_ceiling_request' => $sales['credit_ceiling_request'],
            'sales_tenor_request' => $sales['merk'],
            'sales_customer_no' => $sales['type'],
            'sales_leasing_no' => $sales['leaisng_no'],
            'sales_branch_id' => $sales['branch_id'],
            'sales_credit_type' => $sales['credit_type'],
            'sales_user_id' => $sales['user_id'],
            'sales_approval' => $sales['approval'],
        ];
    }

    public function getNo()
    {
        $sales = new Sales();
        $sales->id = Uuid::uuid4()->getHex();
        $sales->sales_no = Sales::Maxno();
        $sales->user_id = Auth::guard('api')->user('id');
        $sales->save();

        return $sales;
    }
}
