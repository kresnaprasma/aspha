<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ep = Employee::find($id);

        if (empty($ep)) {
            return Response::json([
                'error'=>true,
                'message'=>'Cannot delete this employee',
                'code'=>500
            ], 500);
        }
        else{
            foreach ($ep->pictures as $value) {
                Storage::delete('profile/'.$value->filename);   
            }

            $ep->delete();

            return Response::json([
                'error'=>true,
                'message'=>'Successfully delete employee',
                'code'=>200,
                'data'=>$ep
            ], 200);
        }
    }

    /**
    * Create nip for employee
    *
    * @param $request
    * @return \Illuminate\Http\Response
    */
    public function createNip(Request $request)
    {
        $emp = new Employee();
        $emp->id = Uuid::uuid4()->getHex();
        $emp->nip = $emp->Maxno();
        $emp->name = Uuid::uuid4()->getHex();
        $emp->email = Uuid::uuid4()->getHex();
        $emp->blood_type = 'A';
        $emp->gender = 'male';
        $emp->job_status = 'Active';
        $emp->is_user = false;
        $emp->branch_id = Branch::first()->id;
        $emp->save();

        return Response::json([
          'error'=>false,
          'code'=> 200,
          'employee_id' => $emp->id,
          'employee_nip' => $emp->nip,
          'employee_email' => $emp->email,
          'employee_blood_type' => $emp->blood_type,
          'employee_gender'=> $emp->gender,
          'employee_job_status'=> $emp->job_status,
          'employee_is_user'=> $emp->is_user,
          'employee_branch'=> $emp->branch_id,
        ], 200);
    }
}
