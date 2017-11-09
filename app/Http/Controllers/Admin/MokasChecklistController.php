<?php

namespace App\Http\Controllers\Admin;

use App\MokasChecklist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MokasChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mokaschecklists = MokasChecklist::all();
        return view('admin.mokaschecklist.index', compact('mokaschecklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mokaschecklist.create');
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
            'mokascheck_no' => 'required|',
            'machine_number' => 'required',
            'chassis_number' => 'required',
            'mokas_no' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mokaschecklist = new MokasChecklist();
        $mokaschecklist->id = Uuid::uuid4()->getHex();
        $mokaschecklist->customercollateral_no = MokasChecklist::Maxno();
        $mokaschecklist->mokascheck_no = $request->input('mokascheck_no');
        $mokaschecklist->machine_number = $request->input('machine_number');
        $mokaschecklist->chassis_number = $request->input('chassis_number');
        $mokaschecklist->mokas_no = $request->input('mokas_no');
        $mokaschecklist->save();

        if (!$mokaschecklist) {
            return redirect()->back()->withInput()->withErrors('cannot create Cust. Checklist');
        }else{
            return redirect('/admin/mokaschecklist')->with('success', 'Successfully create Checklist');
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
        $mokaschecklist = MokasChecklist::find($id);
        return view('admin.mokaschecklist.update', compact('mokaschecklist'));
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

        $mokaschecklist = MokasChecklist::find($id);
        $mokaschecklist->update($request->all());

        if (!$mokaschecklist) {
            return redirect()->back()->withInput()->withError('cannot update checklist');
        }else{
            return redirect('/admin/mokaschecklist')->with('success', 'Successfully update checklist');
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
            $mokaschecklist = MokasChecklist::find($value);
            $mokaschecklist->delete();   
        }

        if (!$mokaschecklist) {
            return redirect()->back()->withInput()->withError('cannot delete customer');
        }else{
            return redirect()->back()->with('success', 'Successfully delete customer');
        }
    }
}
