<?php

namespace App\Http\Controllers\Admin;

use App\CustomerCollateral;
use App\Cash;
use App\Leasing;
use App\Branch;
use App\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custcoll = CustomerCollateral::all();
        $cash = Cash::all();
        return view('admin.loan.index', compact('custcoll', 'cash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_list = Branch::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'customer_no');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        return view('admin.loan.create', compact('customer_list', 'branch_list', 'leasing_list'));
    }

    /*public function myformAjax($id)
    {
        $typeall = Type::where("merk_id", $id)
                ->pluck("name", "name");
        return json_encode($typeall);
    }

    public function myformEdit($id)
    {
        $typeedit = Type::where("merk_id", $id)
                ->pluck("name", "name");
        return json_encode($typeedit);
    }*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'stnk' => 'required',
            'bpkb' => 'required',
            'machine_number' => 'required|numeric',
            'chassis_number' => 'required|numeric',
            'credit_ceiling_request' => 'required',
            'tenor_request' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $custcoll = New CustomerCollateral();
        $custcoll->id = Uuid::uuid4()->getHex();
        $custcoll->customercollateral_no = CustomerCollateral::Maxno();
        $custcoll->stnk = $request->input('stnk');
        $custcoll->bpkb = $request->input('bpkb');
        $custcoll->machine_number = $request->input('machine_number');
        $custcoll->chassis_number = $request->input('chassis_number');
        $custcoll->vehicle_color = $request->input('vehicle_color');
        $custcoll->vehicle_cc = $request->input('vehicle_cc');
        $custcoll->collateral_name = $request->input('collateral_name');
        $custcoll->vehicle_date = $request->input('vehicle_date');
        $custcoll->stnk_due_date = $request->input('stnk_due_date');
        $custcoll->save();

        $cash = new Cash();
        $cash->id = Uuid::uuid4()->getHex();
        $cash->cash_no = Cash::Maxno();
        $cash->credit_ceiling_request = $request->input('credit_ceiling_request');
        $cash->tenor_request = $request->input('tenor_request');
        $cash->customer_no = $request->input('customer_no');
        $cash->leasing_no = $request->input('leasing_no');
        $cash->branch_id = $request->input('branch_id');
        $cash->save();

        if (!$custcoll || !$cash) {
            return redirect()->back()->withInput()->withErrors('Cannot Create Loan');
        }else{
            return redirect('admin/loan/')->with('success', 'Successfully create Loan');
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
    public function delete(Request $request)
    {
        foreach ($request->input('id') as $value) {
            Loan::find($value)->delete();
       }
        return redirect()->back()->with('Success', 'Loan deleted Successfully');
    }

    public function downloadExcel()
    {
        $data = Loan::get()->toArray();
        return Excel::create('Daftar Peminjaman', function($excel) use ($data) {
            $excel->sheet('Sheet1', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

}