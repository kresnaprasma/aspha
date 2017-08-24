<?php

namespace App\Http\Controllers\Admin;

use App\Cash;
use App\Cashfix;
use App\Leasing;
use App\Branch;
use App\Customer;
use App\CustomerCollateral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash = Cash::all();
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');
        return view('admin.cash.index', compact('cash', 'branch_list', 'customer_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $branch_list = Branch::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'customer_no');
        $customer_id = Customer::Maxno();
        return view('admin.cash.create', compact('leasing_list', 'branch_list', 'customer_list', 'customer_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'credit_ceiling_request' => 'required',
            'tenor_request' => 'required',
            'stnk' => 'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cash = new Cash();
        $cash->id = Uuid::uuid4()->getHex();
        $cash->cash_no = Cash::Maxno();
        $cash->credit_ceiling_request = $request->input('credit_ceiling_request');
        $cash->tenor_request = $request->input('tenor_request');
        $cash->customer_no = $request->input('customer_no');
        $cash->leasing_no = $request->input('leasing_no');
        $cash->branch_id = $request->input('branch_id');
        $cash->user_id = auth()->user()->id;
        $cash->save();


        $cc = new CustomerCollateral();
        $cc->id = Uuid::uuid4()->getHex();
        $cc->customercollateral_no = CustomerCollateral::Maxno();
        $cc->stnk = $request->input('stnk');
        $cc->bpkb = $request->input('bpkb');
        $cc->machine_number = $request->input('machine_number');
        $cc->chassis_number = $request->input('chassis_number');
        $cc->vehicle_color = $request->input('vehicle_color');
        $cc->vehicle_cc  = $request->input('vehicle_cc');
        $cc->collateral_name = $request->input('collateral_name');
        $cc->vehicle_date = $request->input('vehicle_date');
        $cc->stnk_due_date = $request->input('stnk_due_date');
        $cc->customer_no = $request->input('customer_no');
        $cc->save();


        $cf = new Cashfix();
        $cf->id = Uuid::uuid4()->getHex();
        $cf->cashfix_no = Cashfix::Maxno();
        $cf->tenor_approve = $request->input('tenor_approve');
        $cf->payment = $request->input('payment');
        $cf->approve_date = $request->input('approve_date');
        $cf->leasing_no = $request->input('leasing_no');
        $cf->save();

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }else{
            return redirect('/admin/cash')->with('success', 'Successfully create Dana Tunai');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cash = Cash::find($id); 

        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $branch_list = Branch::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'customer_no');
        $plafondfix_no = Cashfix::Maxno();

        return view('admin.cash.edit', compact('cash', 'leasing_list', 'branch_list', 'customer_list', 'plafondfix_no'));
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
        $validator = validator::make($request->all(), [
            'credit_ceiling_request' => 'required',
            'tenor_request' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cash = Cash::find($id);
        $cash->update($request->all());

        $col_id = $cash->CustomerCollateral->id;
        $cc = CustomerCollateral::find($col_id);
        $cc->update($request->all());

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('
                Cant update cash' );
        }else{
            return redirect('/admin/cash')->with('success', 'Successfully update cash');
        }
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

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'=>'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach ($request->input('id') as $key => $value) {
            $cash = Cash::find($value);
            $cash->delete();
        }

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('cannot delete cash');
        }else{
            return redirect()->back()->with('success', 'Successfully delete cash');
        }
    }
}
