<?php

namespace App\Http\Controllers\Admin;

use App\Customercollateral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;


class CustomerCollateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custcoll = Customercollateral::all();

        return view('loan.custcoll.index', compact('custcoll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customercollateral_id = Customercollateral::Maxno();
        return view('loan.custcoll.create', compact('customercollateral_id'));
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
            'stnk' => 'required|',
            'bpkb' => 'required|',
            'machine_number' => 'required|numeric',
            'chassis_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $custcoll = new Customercollateral();
        $custcoll->id = Uuid::uuid4()->getHex();
        $custcoll->customercollateral_no = Customercollateral::Maxno();
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

        if (!$custcoll) {
            return redirect()->back()->withInput()->withErrors('cannot create Cust. Collateral');
        }else{
            return redirect('/loan/custcoll')->with('success', 'Successfully create Cust. Collateral');
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
        $custcoll = Customercollateral::find($id);

        return view('loan.custcoll.edit', compact('custcoll'));
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
            'stnk' => 'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $custcoll = Customercollateral::find($id);
        $custcoll->update($request->all());

        if (!$custcoll) {
            return redirect()->back()->withInput()->withErrors('
                Cant update Customer Collateral' );
        }else{
            return redirect('/loan/custcoll')->with('success', 'Successfully update Customer Collateral');
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
            $custcoll = Customercollateral::find($value);
            $custcoll->delete();
        }

        if (!$custcoll) {
            return redirect()->back()->withInput()->withErrors('cannot delete Customer Collateral');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Customer Collateral');
        }
    }
}
