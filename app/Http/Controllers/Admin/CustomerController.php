<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

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
        $customer_list = Customer::pluck('name', 'id');
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.customer.index', compact('customer', 'branch_list', 'customer_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_list = Branch::pluck('name', 'id');
        $customer_id = Customer::Maxno();
        return view('admin.customer.create', compact('branch_list', 'customer_id'));
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
            'branch_id'=>'required',
            'name'=>'required',
            'email'=>'required|string|unique:suppliers',
            'address'=>'required',
            'identity_number' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $customer = new Customer();
        $customer->id = Uuid::uuid4()->getHex();
        $customer->customer_no = Customer::Maxno();
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->active = $request->input('active');
        $customer->birthdate = $request->input('birthdate');
        $customer->birthplace = $request->input('birthplace');
        $customer->identity_number = $request->input('identity_number');
        $customer->gender = $request->input('gender');
        $customer->rt = $request->input('rt');
        $customer->rw = $request->input('rw');
        $customer->postalcode = $request->input('postalcode');
        $customer->kelurahan = $request->input('kelurahan');
        $customer->kecamatan = $request->input('kecamatan');
        $customer->kabupaten = $request->input('kabupaten');
        $customer->city = $request->input('city');
        $customer->province = $request->input('province');
        $customer->kk_number = $request->input('kk_number');
        $customer->branch_id = $request->input('branch_id');
        $customer->save();

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot create customer');
        }else{
            return redirect(/*'/admin/loan/create'*/)->back()->with('success', 'Successfully create customer');
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
        $customer = Customer::find($id);

        $branch_list = Branch::pluck('name', 'id');

        return view('admin.customer.edit', compact('customer','branch_list'));
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
            'name'=>'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $customer = Customer::find($id);
        $customer->update($request->all());

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot update customer');
        }else{
            return redirect('/admin/customer')->with('success', 'Successfully update customer');
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
            $customer = Customer::find($value);
            $customer->delete();   
        }

        if (!$customer) {
            return redirect()->back()->withInput()->withError('cannot delete customer');
        }else{
            return redirect()->back()->with('success', 'Successfully delete customer');
        }
    }
}
