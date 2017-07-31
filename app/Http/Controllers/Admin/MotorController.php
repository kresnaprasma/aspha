<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\Merk;
use App\Type;
use App\Supplier;
use App\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

use Excel;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::all();
        return view('admin.motor.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merkall = Merk::pluck('name', 'id');
        $branch_list = Branch::pluck('name', 'id');
        $supplier_list = Supplier::pluck('name', 'id');
        return view('admin.motor.create', compact('merkall', 'branch_list', 'supplier_list'));
    }

    public function myformAjax($id)
    {
        $typeall = Type::where("merk_id", $id)
            ->pluck('name', 'id');
        return json_encode($typeall);
    }

    public function myformEdit($id)
    {
        $typeedit = Type::where("name", $id)
                        ->pluck("name", "id");
        return json_encode($typeedit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'merk' => 'required',
            'type' => 'required',
            'post_name' => 'required|min:6',
            'post_price' => 'required|numeric',
            'stnk_address' => 'required',
            'condition' => 'required',
            'status' => 'required',
            'description' => 'required',
        ],[
            'merk.required' => 'Kolom merk harus diisi',
            'type.required' => 'Kolom type harus diisi',
            'post_name.required' => 'Nama postingan barang harus diisi',
            'post_name.min' => 'Post Name is must be at least 6 character',
            'post_price.required' => 'Harga wajib dicantumkan',
            'post_price.numeric' => 'Hanya diisi oleh angka tanpa tambahan simbol',
            'stnk_address.required' => 'Alamat STNK is required',
            'condition.required' => 'Kondisi motor terakhir',
            'status.required' => 'Status motor harap diisi',
            'description.required' => 'Description is required', 
        ]);

        Motor::create($request->all());
        return redirect('/admin/motor')->with('Success', 'Motor Created Successfully');
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
        $merkall = Merk::pluck('name', 'id');
        $motor = Motor::find($id);
        return view('admin.motor.edit', compact('motor', 'merkall'));
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
        $edit = Motor::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Motor updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach ($request->input('id') as $value) {
            Motor::find($value)->delete();
        }

        return redirect()->back()->with('Success', 'Motor Deleted Successfully');
    }

    public function downloadExcel()
    {
        $data = Motor::get()->toArray();
        return Excel::create('Post Motor List', function ($excel) use ($data) {
            $excel->sheet('Sheet Motor', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
