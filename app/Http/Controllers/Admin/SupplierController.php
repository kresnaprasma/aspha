<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();

        return view('admin.master.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank_list = Bank::pluck('alias', 'id');
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.master.supplier.create', compact('bank_list','branch_list'));
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
            // 'supplier_no'=>'required|string|max:10',
            'name'=>'required',
            'email'=>'required|string|unique:suppliers',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $supplier = new Supplier();
        $supplier->id = Uuid::uuid4()->getHex();
        $supplier->supplier_no = Supplier::Maxno();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->address = $request->input('address');
        $supplier->phone = $request->input('phone');
        $supplier->npwp = $request->input('npwp');
        $supplier->pic_name = $request->input('pic_name');
        $supplier->pic_phone = $request->input('pic_phone');
        $supplier->account_no = $request->input('account_no');
        $supplier->account_name = $request->input('account_name');
        $supplier->bank_id = $request->input('bank_id');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->branch_id = $request->input('branch_id');
        $supplier->save();

        if (!$supplier) {
            return redirect()->back()->withInput()->withError('cannot create supplier');
        }else{
            return redirect()->back()->with('success', 'Successfully create supplier');
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
        $supplier = Supplier::find($id);

        $bank_list = Bank::pluck('alias', 'id');
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.master.supplier.edit', compact('supplier','bank_list','branch_list'));
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
            // 'supplier_no'=>'required|string|max:10',
            'name'=>'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $supplier = Supplier::find($id);
        $supplier->update($request->all());

        if (!$supplier) {
            return redirect()->back()->withInput()->withError('cannot update supplier');
        }else{
            return redirect()->back()->with('success', 'Successfully update supplier');
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
            $supplier = Supplier::find($value);
            $supplier->delete();   
        }

        if (!$supplier) {
            return redirect()->back()->withInput()->withError('cannot delete supplier');
        }else{
            return redirect()->back()->with('success', 'Successfully delete supplier');
        }
    }
}
