<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.master.bank.index', compact('banks'));
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
            'name'=>'required|string',
            'alias'=>'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $bank = Bank::create($request->all());

        if (!$bank) {
            return redirect()->back()->withInput()->withError('cannot create bank');
        }else{
            return redirect()->back()->with('success', 'Successfully create bank');
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
            'name'=>'required|string',
            'alias'=>'required|string'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $bank = Bank::find($id);
        $bank->update($request->all());

        if (!$bank) {
            return redirect()->back()->withError('cannot update bank');
        }else{
            return redirect()->back()->with('success', 'Successfully update bank');
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

        foreach ($request->input('id') as $key => $value) {
            $bank = Bank::find($value);
            $bank->delete();
        }

        if (!$bank) {
            return redirect()->back()->withError('cannot delete bank');
        }else{
            return redirect()->back()->with('success', 'Successfully delete bank');
        }
    }
}
