<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Sales;
use App\Mokas;
use App\Branch;
use App\Leasing;
use App\Customer;


use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $mokas = Mokas::all();
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.sales.index', compact('sales', 'mokas', 'customer_id', 'branch_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');

        $customer_list = Customer::pluck('name', 'customer_no');
        $branch_list = Branch::pluck('name', 'id');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $banks = Bank::pluck('name', 'id');

        $mokas = Mokas::all();

        $vehicle_colorlist = ['WHITE'=>'WHITE', 'SILVER'=>'SILVER', 'BLACK'=>'BLACK', 'GREY'=>'GREY', 
            'RED'=>'RED', 'BLUE-NAVY'=>'BLUE-NAVY', 'BLUE'=>'BLUE', 
            'ORANGE'=>'ORANGE', 'YELLOW'=>'YELLOW', 'CREAM'=>'CREAM', 
            'GREEN'=>'GREEN', 'BROWN'=>'BROWN', 'MAGENTA'=>'MAGENTA', 
            'PURPLE'=>'PURPLE', 'PINK'=>'PINK', 'SPECIAL EDITION'=>'SPECIAL EDITION'];
        $vehicle_cclist = ['110'=>'110', '115'=>'115', 
            '125'=>'125', '135'=>'135', '150'=>'150', 
            '225'=>'225', '250'=>'250'];
        $tenor_requestlist = ['3'=>'3 bulan', '4'=>'4 bulan', '5'=>'5 bulan', 
            '6'=>'6 bulan', '12'=>'12 bulan', '18'=>'18 bulan', '24'=>'24 bulan', 
            '30'=>'30 bulan', '36'=>'36 bulan'];
        return view('admin.sales.create', compact('branch_list', 'leasing_list', 'customer_list', 'tenor_requestlist', 'customer_id', 'branch_list', 'vehicle_cclist', 'vehicle_colorlist', 'mokas', 'banks'));
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
            'customer_name' => 'required',
            'mokas_number' => 'required',
            'ktp' => 'required',
            'kk' => 'required',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }

        $sales = new Sales();
        $sales->id = Uuid::uuid4()->getHex();
        $sales->sales_no = Sales::Maxno();
        $sales->customer_no = $request->input('customer_no');
        $sales->mokas_number = $request->input('mokas_number');
        $sales->ktp = $request->input('ktp');
        $sales->kk = $request->input('kk');
        $sales->bank_id = $request->input('bank_id');
        $sales->rek_number = $request->input('rek_number');
        $sales->others_cost = $request->input('others_cost');
        $sales->payment_method = $request->input('payment_method');
        $sales->down_payment = $request->input('down_payment');
        $sales->tenor = $request->input('tenor');
        $sales->payment = $request->input('payment');
        $sales->branch_id = $request->input('branch_id');
        $sales->leasing_no = $request->input('leasing_no');
        $sales->cashier = $request->input('cashier');
        $sales->save();

        if (empty($sales)) {
            return redirect()->back()->withInput()->withError('cannot create Sales');
        }else{
            return redirect('/sales')->with('success', 'Successfully create Sales');
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
        $sales = Sales::find($id);
       
        $banks = Bank::pluck('name', 'id');
        $branch_list = Branch::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'customer_no');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        
        $vehicle_colorlist = ['WHITE'=>'WHITE', 'SILVER'=>'SILVER', 'BLACK'=>'BLACK', 'GREY'=>'GREY', 
            'RED'=>'RED', 'BLUE-NAVY'=>'BLUE-NAVY', 'BLUE'=>'BLUE', 
            'ORANGE'=>'ORANGE', 'YELLOW'=>'YELLOW', 'CREAM'=>'CREAM', 
            'GREEN'=>'GREEN', 'BROWN'=>'BROWN', 'MAGENTA'=>'MAGENTA', 
            'PURPLE'=>'PURPLE', 'PINK'=>'PINK', 'SPECIAL EDITION'=>'SPECIAL EDITION'];
        $vehicle_cclist = ['110'=>'110', '115'=>'115', 
            '125'=>'125', '135'=>'135', '150'=>'150', 
            '225'=>'225', '250'=>'250'];
        $tenor_requestlist = ['3'=>'3 bulan', '4'=>'4 bulan', '5'=>'5 bulan', 
            '6'=>'6 bulan', '12'=>'12 bulan', '18'=>'18 bulan', '24'=>'24 bulan', 
            '30'=>'30 bulan', '36'=>'36 bulan'];

        return view('admin.sales.edit', compact('sales', 'banks', 'branch_list', 'customer_list', 'leasing_list', 'vehicle_colorlist', 'vehicle_cclist', 'tenor_requestlist'));
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
        $validator = Validator::make($request->all(), [
            'customer_no' => 'required',
            'mokas_number' => 'required',
            'ktp' => 'required',
            'kk' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $sales = Sales::find($id);
        $sales->update($request->all());

        if (!$sales) {
            return redirect()->back()->withInput()->withErrors('Cannot Update Sales');
        } else {
            return redirect('/sales')->with('success', 'success update sales');
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
            'id'=>'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach($request->input('id') as $key => $value) {
            $sales = Sales::find($value);
            $sales->delete();
        }

        if (!$sales) {
            return redirect()->back()->withInput()->withError('cannot delete sales');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Sales');
        }
    }
}
