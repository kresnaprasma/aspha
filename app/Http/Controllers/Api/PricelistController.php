<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PriceSalesHistory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricesaleshistory = PriceSalesHistory::all();

        return response()->json([
            'data'=>$this->transformCollection($pricesaleshistory)
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

        $pricesaleshistory = PriceSalesHistory::create($request->all());

        if (!$pricesaleshistory) {
            return response()->json([
                'status'=> '404',
                'message' => 'cannot save this data',
                'data' => []
            ],404);
        }else{
            return response()->json([
                'status'=> '200',
                'message' => 'Price Created Succesfully',
                'data' => [$this->transform($pricesaleshistory)]
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
        $pricesaleshistory = PriceSalesHistory::find($id);

        if (!$pricesaleshistory) {
            return response()->json([
                'error'=>[
                    'message' => 'Price does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($pricesaleshistory)
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
        //
    }

    public function transformCollection($pricesaleshistory){
        return array_map([$this, 'transform'], $pricesaleshistory->toArray());
    }

    public function transform($pricesaleshistory){
        return [
            'pricesaleshistory_id' => $pricesaleshistory['id'],
            'pricesaleshistory_no' => $pricesaleshistory['pricesaleshistory_no'],
            'pricesaleshistory_merk' => $pricesaleshistory['merk_id'],
            'pricesaleshistory_type' => $pricesaleshistory['type_id'],
            'pricesaleshistory_sellingprice' => $pricesaleshistory['selling_price'],
            'pricesaleshistory_discount' => $pricesaleshistory['discount'],
        ];
    }
}
