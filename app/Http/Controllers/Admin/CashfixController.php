<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Cashfix;
use App\Cash;
use App\Leasing;
use App\Customer;
use App\CreditType;
use App\Customercollateral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class CashfixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashfix = Cash::where('approval', 0)->get();
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');
        $credittype_list = CreditType::pluck('name', 'id');
        return view('admin.approve.index', compact('cashfix', 'branch_list', 'customer_id', 'credittype_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_list = Customer::pluck('name', 'customer_no');
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $cash_list = Cash::pluck('cash_no', 'id');
        $credittype_list = CreditType::pluck('name', 'id');
        $plafondnumber = Cashfix::Maxno();

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

        $cashfix = Cashfix::where('approve', 1)->get();
        return view('admin.approve.fix', compact('leasing_list', 'cash_list', 'branch_list', 'plafondnumber', 'customer_list', 'customer_id', 'vehicle_cclist', 'tenor_requestlist', 'vehicle_colorlist', 'cashfix', 'credittype_list'));
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
            'tenor_approve' => 'required',
            'payment' => 'required',
            'plafond_approve' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cashfix = new Cashfix();
        $cashfix->id = Uuid::uuid4()->getHex();
        $cashfix->cashfix_no = Cashfix::Maxno();
        $cashfix->tenor_approve = $request->input('tenor_approve');
        $cashfix->payment = $request->input('payment');
        $cashfix->approve_date = $request->input('approve_date');
        $cashfix->plafond_approve = $request->input('plafond_approve');
        $cashfix->leasing_no = $request->input('leasing_no');
        $cashfix->cash_no = $request->input('cash_no');
        $cashfix->approve = true;
        $cashfix->save();

        if (!$cashfix) {
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }else{
            return redirect('/approve')->with('success', 'Successfully create Dana Tunai');
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
        $customer_list = Customer::pluck('name', 'customer_no');
        $customer_id = Customer::Maxno();
        $branch_list = Branch::pluck('name', 'id');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $cash_list = Cash::pluck('cash_no', 'id');
        $credittype_list = CreditType::pluck('name', 'id');
        $plafondnumber = Cashfix::Maxno();

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


        $cash = Cashfix::find($id);
        return view('admin.approve.show', compact('cash', 'customer_id', 'customer_list', 'branch_list', 'leasing_list', 'cash_list', 'credittype_list', 'plafondnumber', 'vehicle_colorlist', 'vehicle_cclist', 'tenor_requestlist'));
    }

    /*public function display()
    {
        $cashfix = Cashfix::where('approve', 1)->get();
        return view('admin.approve.fix', compact('cashfix'));

        $displaycash = Cash::find($id);

        return view('admin.approve.show', compact('displaycash'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashfix = Cashfix::find($id);
        $cash = Cash::find($id);
        $collateral_id = Customerocllateral::find($id);
        $customer_id = Customer::find($id);
        $customer_list = Customer::pluck('name', 'customer_no');
        $branch_list = Branch::pluck('name', 'id');
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $cash_list = Cash::pluck('cash_no', 'id');
        $credittype_list = CreditType::pluck('name', 'id');
        $plafondnumber = Cashfix::Maxno();

        $vehicle_colorlist = [''=>'', 'WHITE'=>'WHITE', 'SILVER'=>'SILVER', 'BLACK'=>'BLACK', 'GREY'=>'GREY', 
            'RED'=>'RED', 'BLUE-NAVY'=>'BLUE-NAVY', 'BLUE'=>'BLUE', 
            'ORANGE'=>'ORANGE', 'YELLOW'=>'YELLOW', 'CREAM'=>'CREAM', 
            'GREEN'=>'GREEN', 'BROWN'=>'BROWN', 'MAGENTA'=>'MAGENTA', 
            'PURPLE'=>'PURPLE', 'PINK'=>'PINK', 'SPECIAL EDITION'=>'SPECIAL EDITION'];
        $vehicle_cclist = [''=>'', '110'=>'110', '115'=>'115', 
            '125'=>'125', '135'=>'135', '150'=>'150', 
            '225'=>'225', '250'=>'250'];
        $tenor_requestlist = ['3'=>'3 bulan', '4'=>'4 bulan', '5'=>'5 bulan', 
            '6'=>'6 bulan', '12'=>'12 bulan', '18'=>'18 bulan', '24'=>'24 bulan', 
            '30'=>'30 bulan', '36'=>'36 bulan'];

        return view('admin.approve.edit', compact('cashfix','leasing_list', 'cash_list', 'branch_list', 'plafondnumber', 'customer_list', 'cash', 'vehicle_cclist', 'tenor_requestlist', 'vehicle_colorlist', 'credittype_list'));
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
            'tenor_approve' => 'required',
            'payment' => 'required',
            'plafond_approve' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cashfix = new Cashfix();
        $cashfix->id = Uuid::uuid4()->getHex();
        $cashfix->cashfix_no = Cashfix::Maxno();
        $cashfix->tenor_approve = $request->input('tenor_approve');
        $cashfix->payment = $request->input('payment');
        $cashfix->approve_date = $request->input('approve_date');
        $cashfix->plafond_approve = $request->input('plafond_approve');
        $cashfix->leasing_no = $request->input('leasing_no');
        $cashfix->cash_no = $request->input('cash_no');
        $cashfix->approve = $request->input('approve', 1);
        $cashfix->save();

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('Cant update cashfix' );
        }else{
            return redirect('/loan/cashfix')->with('success', 'Successfully update cashfix');
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
            $cashfix = Cashfix::find($value);
            $cashfix->delete();
        }

        if (!$cashfix) {
            return redirect()->back()->withInput()->withErrors('cannot delete cashfix');
        }else{
            return redirect()->back()->with('success', 'Successfully delete cash');
        }
    }
}
