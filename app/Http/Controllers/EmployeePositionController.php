<?php

namespace App\Http\Controllers;

use App\EmployeeDepartment;
use App\EmployeePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = EmployeePosition::all();
        $dept_list = EmployeeDepartment::pluck('name','department_no');

        return view('human-resource.position.index', compact('position','dept_list'));
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
            'position_no' => 'required|string|max:255|unique:employee_positions',
            'name' => 'required|string|max:255|unique:employee_positions',
            'department_no'=>'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $position = new EmployeePosition();
        $position->id = Uuid::uuid4()->getHex();
        $position->position_no = $request->input('position_no');
        $position->department_no = $request->input('department_no');
        $position->name = $request->input('name');
        $position->save();

        if (empty($position)) {
            return redirect()->back()->withInput()->withError('cannot create Position Employee');
        }else{
            return redirect('admin/human-resource/position')->with('success', 'Successfully create Position Employee');
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
            'position_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'department_no'=>'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $position = EmployeePosition::find($id);
        $position->position_no = $request->input('position_no');
        $position->department_no = $request->input('department_no');
        $position->name = $request->input('name');
        $position->save();

        if (empty($position)) {
            return redirect()->back()->withInput()->withError('cannot update Position Employee');
        }else{
            return redirect('admin/human-resource/position')->with('success', 'Successfully update Position Employee');
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
        $position = EmployeePosition::find($id);

        if (empty($position)) {
            return redirect()->back()->with('Error', "Cannot delete Department");
        }else{
            $position->delete();
            return redirect()->back()->with('Success', "Department deleted Successfully");
        }
    }

    public function delete(Request $request)
    {
        foreach ($request->input('id') as $value) {
            EmployeePosition::find($value)->delete();
        }

        return redirect()->back()->with('Success', "Department deleted Successfully");
    }
}
