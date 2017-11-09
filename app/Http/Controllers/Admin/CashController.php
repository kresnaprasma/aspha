<?php

namespace App\Http\Controllers\Admin;

use App\Merk;
use App\Type;
use App\Cash;
use App\Cashfix;
use App\Leasing;
use App\Branch;
use App\Customer;
use App\CreditType;
use App\Customercollateral;
use App\VehicleCollateral;

use Carbon\Carbon;
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
        $credittype_list = CreditType::pluck('name', 'id');
        $vehiclecollaterals = VehicleCollateral::all();
        return view('admin.cash.index', compact('cash', 'branch_list', 'customer_id', 'credittype_list', 'vehiclecollaterals'));
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
        $credittype_list = CreditType::pluck('name', 'id');
        $vehicle_list = VehicleCollateral::pluck('type_id', 'id');
        $customer_id = Customer::Maxno();
        $vehiclecollaterals = VehicleCollateral::all();
        $types = Type::all();
        $merks = Merk::all();

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
        return view('admin.cash.create', compact('leasing_list', 'branch_list', 'customer_list', 'customer_id', 'vehicle_cclist', 'tenor_requestlist', 'vehicle_colorlist', 'credittype_list', 'vehicle_list', 'vehiclecollaterals', 'types', 'merks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request->all();*/
        $validator = validator::make($request->all(), [
            'credit_ceiling_request' => 'required',
            'tenor_request' => 'required',
            'credit_type' => 'required',
            'stnk' => 'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required'
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
        $cash->credit_type = $request->input('credit_type');
        $cash->maximum_plafond = $request->input('maximum_plafond');
        $cash->user_id = auth()->user()->id;
        $cash->approval = $request->input('approval');

        if ($cash->credit_ceiling_request <= $cash->maximum_plafond) {
            $cash->save();
        }else{
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }


        $cc = new Customercollateral();
        $cc->id = Uuid::uuid4()->getHex();
        $cc->customercollateral_no = Customercollateral::Maxno();
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

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }else{
            return redirect('admin/cash/')->with('success', 'Successfully create Dana Tunai');
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
        $credittype_list = CreditType::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'customer_no');
        $customer_id = Customer::Maxno();

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

        return view('admin.cash.create', compact('cash', 'leasing_list', 'branch_list', 'customer_id', 'customer_list', 'vehicle_cclist', 'vehicle_colorlist', 'vehicle_cclist','tenor_requestlist', 'credittype_list'));
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
            'credit_type' => 'required',
            'stnk' => 'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cash = Cash::find($id);
        $cash->update($request->all());

        $col_id = $cash->CustomerCollateral->id;
        $cc = Customercollateral::find($col_id);
        $cc->update($request->all());

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('Cant update cash');
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
