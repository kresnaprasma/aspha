<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Customer;
use App\Leasing;
use App\Cash;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cash = Cash::where('cash_no', $id)->first();

        if (!$cash) {
            return Response()->json([
                'error'=>[
                    'message' => 'cash does not exist'
                ]
            ], 404);
        }

        return Response()->json([
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
        $cash = Cash::where('id', $id)->first();
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

    public function getNo(Request $request)
    {
        $cash = new Cash();
        $cash->id = Uuid::uuid4()->getHex();
        $cash->cash_no = Cash::Maxno();
        $cash->credit_ceiling_request = '0';
        $cash->tenor_request = '3';
        $cash->maximum_plafond = '0';
        $cash->leasing_no = 'LSN17110001';
        $cash->branch_id = '1';
        $cash->credittype_id = '1';
        $cash->user_id = '2';
        $cash->approval = false;
        $cash->save();

        return Response::json([
            'error' => false,
            'code' => 200,
            'cash_id' => $cash->id,
            'cash_no' => $cash->cash_no,
            'cash_credit_ceiling_request' => $cash->credit_ceiling_request,
            'cash_tenor_request' => $cash->tenor_request,
            'cash_maximum_plafond' => $cash->maximum_plafond,
            'cash_leasing_no' => $cash->leasing_no,
            'cash_branch_id' => $cash->branch_id,
            'cash_credittype_id' => $cash->credittype_id,
            'cash_user_id' => $cash->user_id,
            'cash_approval' => $cash->approval,
        ], 200);
    }
}
