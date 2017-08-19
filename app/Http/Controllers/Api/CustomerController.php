<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();

        return response()->json([
            'data'=>$this->transformCollection($customer)
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
    /*public function add(Request $request)
    {
        if (request()->ajax()) {
            $customer = Customer::find($customer_id);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' =>'required',
                'birth_date' => 'required',
                'identity_number' => 'required',
                'phone' => 'required',
                'gender' => 'required'
            ]);
        }
    }*/

    public function search($id)
    {
        $customer = Customer::find($id)->get();
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' =>'required',
            'birth_date' => 'required',
            'identity_number' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => '404',
                    'message' => $validator->errors(),
                    'data' => []
                ], 404
            );
        }

        $customer = Customer::create($request->all());

        if (!$customer) {
            return response()->json([
                'status'=>'404',
                'message'=>'cannot save this data',
                'data'=> []
            ], 404);
        }else{
            return response()->json([
                'status' => '200',
                'message' => 'Customer created Successfully',
                'data' => [$this->transform($customer)]
            ], 200);
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
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'error'=>[
                    'message' => 'Customer does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($customer)
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
        $customer = Customer::find($id);
        $customer->update($request->all());
        return response()->json([
            'data'=>$this->transform($customer)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json([
            'data'=>$this->transform($customer)]);
    }

    public function transformCollection($customers){
        return array_map([$this, 'transform'], $customers->toArray());
    }

    public function transform($customer){
        return [
            'customer_id' => $customer['id'],
            'customer_no' => $customer['customer_no'],
            'customer_name' => $customer['name'],
            'customer_address' => $customer['address'],
            'customer_email' => $customer ['email'],
            'customer_phone' => $customer['phone'],
            'customer_active' => $customer['active'],
            'customer_branch_id' => $customer['branch_id'],
            'customer_birthdate' => $customer['birthdate'],
            'customer_birthplace' => $customer['birthplace'],
            'customer_identity_number' => $customer['identity_number'],
            'customer_gender' => $customer['gender'],
            'customer_rt' => $customer['rt'],
            'customer_rw' => $customer['rw'],
            'customer_postalcode' => $customer['postalcode'],
            'customer_kelurahan' => $customer['kelurahan'],
            'customer_kecamatan' => $customer['kecamatan'],
            'customer_kabupaten' => $customer['kabupaten'],
            'customer_city' => $customer['city'],
            'customer_province' => $customer['province'],
            'customer_kk_number' => $customer['kk_number']
        ];
    }
}
