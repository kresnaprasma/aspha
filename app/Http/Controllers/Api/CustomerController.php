<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $customer = Customer::find($id);

        if (!$loan) {
            return response()->json([
                'error'=>[
                    'message' => 'Customer does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transformCollection($customer)
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

    private function transformCollection($customers){
        return array_map([$this, 'transform'], $customers->toArray());
    }

    private function transform($customers){
        return [
            'customer_id' => $customer['id'];
            'customer_ktp_number' => $customer['ktp_number'];
            'customer_familycard_number' => $customer['familycard_number'];
            'customer_fullname' => $customer['fullname'];
            'customer_address' => $customer ['address'];
            'customer_post_code' => $customer['post_code'];
            'customer_birth_date' => $customer['birth_date'];
            'customer_job' => $customer['job'];
            'customer_company_address' => $customer['company_address'];
            'customer_handphone' => $customer['handphone'];
            'customer_salary' => $customer['salary'];
            'customer_email' => $customer['email'];
            'customer_password' => $customer['password'];
        ];
    }
}
