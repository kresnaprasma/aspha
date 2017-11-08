<?php

namespace App\Http\Controllers;

use App\EmployeeDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class EmployeeDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts = EmployeeDepartment::all();

        return view('human-resource.department.index', compact('depts'));
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
        $validator = Validator::make($request->all(), [
            'department_no' => 'required|string|max:255|unique:employee_departments',
            'name' => 'required|string|max:255|unique:employee_departments',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dept = new EmployeeDepartment();
        $dept->id = Uuid::uuid4()->getHex();
        $dept->department_no = $request->input('department_no');
        $dept->name = $request->input('name');
        $dept->save();

        if (empty($dept)) {
            return redirect()->back()->withInput()->withError('cannot create Department');
        }else{
            return redirect('admin/human-resource/department')->with('success', 'Successfully create Department');
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
        return view('human-resource.department.edit');
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
            'department_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $dept = EmployeeDepartment::find($id);
        $dept->department_no = $request->input('department_no');
        $dept->name = $request->input('name');
        $dept->save();

        if (empty($dept)) {
            return redirect()->back()->withInput()->withError('cannot update Department');
        }else{
            return redirect('admin/human-resource/department')->with('success', 'Successfully update Department');
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
        $dept = EmployeeDepartment::find($id);

        if (empty($dept)) {
            return redirect()->back()->with('Error', "Cannot delete Department");
        }else{
            $dept->delete();
            return redirect()->back()->with('Success', "Department deleted Successfully");
        }
    }

    public function delete(Request $request)
    {
        foreach ($request->input('id') as $value) {
            EmployeeDepartment::find($value)->delete();
        }

        return redirect()->back()->with('Success', "Department deleted Successfully");
    }
}
