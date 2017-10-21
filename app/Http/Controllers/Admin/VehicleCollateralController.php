<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\VehicleCollateral;
use App\Merk;
use App\Type;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;

class VehicleCollateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $VehicleCollaterals = VehicleCollateral::all();
        $merkall = Merk::pluck("name", "id");
        $merkedit = Merk::pluck("name", "id");
        $typeall = Type::pluck('name', 'id');
        return view('admin.master.vehiclecollateral.index', compact('VehicleCollaterals', 'merkall', 'merkedit', 'typeall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiclecollateral = VehicleCollateral::all();
        $merkall = Merk::pluck("name", "id");
        return view('admin.master.vehiclecollateral.create', compact("merkall", 'vehiclecollateral'));
    }

    public function myformAjax($id)
    {
        $typeall = Type::where("merk_id", $id)
                        ->pluck("name", "id");
        return json_encode($typeall);
    }

    public function myformEdit($id)
    {
        $typeedit = Type::where("name", $id)
                        ->pluck("name", "id");
        return json_encode($typeedit);
        /*return view('admin.vehiclecollateral.index', compact('merkedit'));*/
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
            'merk_id' => 'required',
            'type_id' => 'required',
            'vehicle_date' => 'required',
            'vehicle_price' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vehiclecollateral = new VehicleCollateral();
        $vehiclecollateral->merk_id = $request->input('merk_id');
        $vehiclecollateral->type_id = $request->input('type_id');
        $vehiclecollateral->vehicle_date = $request->input('vehicle_date');
        $vehiclecollateral->vehicle_price = $request->input('vehicle_price');
        $vehiclecollateral->save();

        if (!$vehiclecollateral) {
            return redirect()->back()->withInput()->withErrors('cannot create Dana Tunai');
        }else{
            return redirect('admin/master/vehiclecollateral')->with('success', 'Successfully create Dana Tunai');
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
        $edit = VehicleCollateral::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Collateral updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        foreach($request->input('id') as $value) {
            VehicleCollateral::find($value)->delete();
        }

        return redirect()->back()->with('Success', "Collateral Deleted Successfully");
    }

    public function downloadExcel()
    {
        $data = VehicleCollateral::get()->toArray();
        return Excel::create('Daftar Harga Motor', function($excel) use ($data) {
            $excel->sheet('Sheet Harga Motor', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}