<?php

namespace App\Http\Controllers\Admin;

use App\Cashfix;
use App\Cash;
use App\Leasing;

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
        $cashfix = Cashfix::all();

        return view('admin.loan.cashfix.index', compact('cashfix'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $cash_list = Cash::pluck('cash_no', 'id');

        return view('admin.loan.cashfix.create', compact('leasing_list', 'cash_list'));
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
        $cashfix->leasing_no = $request->input('leasing_no');
        $cashfix->cash_no = $request->input('cash_no');

        if (!$cashfix) {
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }else{
            return redirect('/admin/loan/cashfix')->with('success', 'Successfully create Dana Tunai');
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
        $cashfix = Cashfix::find($id);

        $leasing_list = Leasing::pluck('name', 'leasing_no');
        $cash_list = Cash::fix('cash_no', 'id');

        return view('admin.loan.cashfix.create', compact('cashfix','leasing_list', 'cash_list'));
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
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cashfix = Cashfix::find($id);
        $cashfix->update($request->all());

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('
                Cant update cashfix' );
        }else{
            return redirect('/admin/loan/cashfix')->with('success', 'Successfully update cashfix');
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

        if (!$cash) {
            return redirect()->back()->withInput()->withErrors('cannot delete cash');
        }else{
            return redirect()->back()->with('success', 'Successfully delete cash');
        }
    }
}
