<?php

namespace App\Http\Controllers\Admin;

use App\Leasing;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class LeasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leasing = Leasing::all();

        return view('admin.master.leasing.index', compact('leasing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_list = Branch::pluck('name', 'id');
        return view('admin.master.leasing.create', compact('branch_list'));
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|string|unique:leasings',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $leasing = new Leasing();
        $leasing->id = Uuid::uuid4()->getHex();
        $leasing->leasing_no = Leasing::Maxno();
        $leasing->name = $request->input('name');
        $leasing->address = $request->input('address');
        $leasing->email = $request->input('email');
        $leasing->npwp = $request->input('npwp');
        $leasing->pic_name = $request->input('pic_name');
        $leasing->phone = $request->input('phone');
        $leasing->branch_id = $request->input('branch_id');
        $leasing->save();

        if (!$leasing) {
            return redirect()->back()->withInput()->withErrors('cannot create Leasing');
        }else{
            return redirect('/master/leasing')->with('success', 'Successfully create Leasing');
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
        $leasing = Leasing::find($id);

        $branch_list = Branch::pluck('name', 'id');

        return view('admin.master.leasing.edit', compact('leasing', 'branch_list'));
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
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $leasing = Leasing::find($id);
        $leasing->update($request->all());

        if (!$leasing) {
            return redirect()->back()->withInput()->withErrors('
                Cant update leasing' );
        }else{
            return redirect('/master/leasing')->with('success', 'Successfully update leasing');
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
            $leasing = Leasing::find($value);
            $leasing->delete();
        }

        if (!$leasing) {
            return redirect()->back()->withInput()->withErrors('cannot delete leasing');
        }else{
            return redirect()->back()->with('success', 'Successfully delete leasing');
        }
    }
}
