<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::all();
        return view('admin.master.branch.index', compact('branch'));
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
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $branch = Branch::create($request->all());

        if (!$branch) {
            return redirect()->back()->withInput()->withError('cannot create branch');
        }else{
            return redirect()->back()->with('success', 'Successfully create branch');
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
        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages(); 
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $branch = Branch::find($id);
        $branch->update($request->all());

        if (!$branch) {
            return redirect()->back()->withInput()->withError('cannot update branch');
        }else{
            return redirect()->back()->with('success', 'Successfully update branch');
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
            $bank = Branch::find($value);
            $bank->delete();
        }

        if (!$bank) {
            return redirect()->back()->withError('cannot delete Branch');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Branch');
        }
    }
}
