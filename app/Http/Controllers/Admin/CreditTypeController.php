<?php

namespace App\Http\Controllers\Admin;

use App\CreditType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credittypes = CreditType::all();
        return view('admin.master.credittype.index', compact('credittypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CreditType::create($request->all());

        return redirect()->back()->with('Success', 'Credit Type Created Successfully');
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
        $edit = CreditType::find($id)->update($request->all());

        return redirect()->back()->with('Success', 'Credit Type updated Successfully');
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
        foreach ($request->input('id') as $value) {
            CreditType::find($value)->delete();
        }

        return redirect()->back()->with('Success', "Credit Type deleted Successfully");
    }
}
