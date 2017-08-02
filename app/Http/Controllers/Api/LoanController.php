<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();

        return response()->json([
            'data'=>$this->transformCollection($loans)
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

        $loan = Loan::create($request->all());

        if (!$loan) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'Loan Created Succesfully',
                'data' => [$this->transform($loan)]
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
        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'error'=>[
                    'message' => 'Loan does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($loan)
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
        $loan = Loan::find($id);
        $loan->update($request->all());
        return response()->json([
            'data'=>$this->transform($loan)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::find($id);
        $loan->delete();
        return response()->json([
            'data'=>$this->transform($loan)]);
    }

    private function transformCollection($loans){
        return array_map([$this, 'transform'], $loans->toArray());
    }
 
    private function transform($loan){
        return [
            'loan_id' => $loan['id'],
            'loan_collateral_id' => $loan['collateral_id'],
            'loan_merk' => $loan['merk'],
            'loan_type' => $loan['type'],
            'loan_color' => $loan['vehicle_color'],
            'loan_cc' => $loan['vehicle_cc'],
            'loan_stnk' => $loan['stnk_due_date'],
            'loan_date' => $loan['vehicle_date'],
            'loan_bpkb' => $loan['bpkb'],
            'loan_tenor' => $loan['tenor'],
            'loan_price' => $loan['price_request'],
            'loan_approval' => $loan['approvals'],
            'loan_user' => $loan['user_approval']
        ];
    }
}
