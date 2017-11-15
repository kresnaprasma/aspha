<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Employee;
use App\EmployeeDepartment;
use App\EmployeePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();

        return view('human-resource.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_list = Branch::pluck('name','id');
        $position_list = EmployeePosition::pluck('name','position_no');
        $department_list = EmployeeDepartment::pluck('name','department_no');

        return view('human-resource.employee.create',compact('branch_list','position_list','department_list'));
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
            'id' => 'required',
            'nip' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $emp = Employee::find($request->input('id'));

        $emp->nip = $request->input('nip');
        $emp->name = $request->input('name');
        $emp->alias = $request->input('alias');
        $emp->email = $request->input('email');
        $emp->facebook_account = $request->input('facebook_account');
        $emp->instagram_account = $request->input('instagram_account');
        $emp->address = $request->input('address');
        $emp->city = $request->input('city');
        $emp->kelurahan = $request->input('kelurahan');
        $emp->kecamatan = $request->input('kecamatan');
        $emp->province = $request->input('province');
        $emp->birthday = $request->input('birthday');
        $emp->birthplace = $request->input('birthplace');
        $emp->phone = $request->input('phone');
        $emp->marrital = $request->input('marrital');
        $emp->blood_type = $request->input('blood_type');
        $emp->zipcode = $request->input('zipcode');
        $emp->gender = $request->input('gender');
        $emp->bank_account = $request->input('bank_account');
        $emp->npwp = $request->input('npwp');
        $emp->bank_branch = $request->input('bank_branch');
        $emp->bank_name = $request->input('bank_name');
        $emp->job_status = $request->input('job_status');
        $emp->job_start = $request->input('job_start');
        $emp->job_end = $request->input('job_end');
        $emp->branch_id = $request->input('branch_id');
        $emp->department_no = $request->input('department_no');
        $emp->position_no = $request->input('position_no');
        $emp->grade = $request->input('grade');
        $emp->mother_name = $request->input('mother_name');
        $emp->save();

        if (empty($emp)) {
            return redirect()->back()->withInput()->withError('cannot create Employee');
        }else{
            return redirect('/human-resource/employee')->with('success', 'Successfully create Employee');
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
        $emp = Employee::find($id);
        $branch_list = Branch::pluck('name','id');
        $position_list = EmployeePosition::pluck('name','position_no');
        $department_list = EmployeeDepartment::pluck('name','department_no');

        return view('human-resource.employee.edit',compact('emp','branch_list','position_list','department_list'));   
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
            'nip' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $emp = Employee::find($id);
        $emp->nip = $request->input('nip');
        $emp->name = $request->input('name');
        $emp->alias = $request->input('alias');
        $emp->email = $request->input('email');
        $emp->facebook_account = $request->input('facebook_account');
        $emp->instagram_account = $request->input('instagram_account');
        $emp->address = $request->input('address');
        $emp->city = $request->input('city');
        $emp->kelurahan = $request->input('kelurahan');
        $emp->kecamatan = $request->input('kecamatan');
        $emp->province = $request->input('province');
        $emp->birthday = $request->input('birthday');
        $emp->birthplace = $request->input('birthplace');
        $emp->phone = $request->input('phone');
        $emp->marrital = $request->input('marrital');
        $emp->blood_type = $request->input('blood_type');
        $emp->zipcode = $request->input('zipcode');
        $emp->gender = $request->input('gender');
        $emp->bank_account = $request->input('bank_account');
        $emp->npwp = $request->input('npwp');
        $emp->bank_branch = $request->input('bank_branch');
        $emp->bank_name = $request->input('bank_name');
        $emp->job_status = $request->input('job_status');
        $emp->job_start = $request->input('job_start');
        $emp->job_end = $request->input('job_end');
        $emp->branch_id = $request->input('branch_id');
        $emp->department_no = $request->input('department_no');
        $emp->position_no = $request->input('position_no');
        $emp->grade = $request->input('grade');
        $emp->mother_name = $request->input('mother_name');
        $emp->save();

        if (empty($emp)) {
            return redirect()->back()->withInput()->withError('cannot update Employee');
        }else{
            return redirect('/human-resource/employee')->with('success', 'Successfully update Employee');
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
        foreach ($request->input('id') as $value) {
            $ep = Employee::find($value);
            
            foreach ($ep->pictures as $value) {
                Storage::delete('profile/'.$value->filename);   
            }

            $ep->delete();
        }

        return redirect()->back()->with('Success', "Employee deleted Successfully");
    }
}
