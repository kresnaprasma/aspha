<?php

namespace App\Http\Controllers\Admin;

use App\Mokas;
use App\Branch;
use App\Merk;
use App\Type;
use App\Customer;
use App\Leasing;
use App\PriceSalesHistory;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MokasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mokas = Mokas::all();
        $merkall = Merk::pluck("name", "id");
        $merkedit = Merk::pluck("name", "id");
        $typeall = Type::pluck('name', 'id');
        $pricesaleshistory = PriceSalesHistory::all();
        return view('admin.mokas.index', compact('mokas', 'merkall', 'merkedit', 'typeall', 'pricesaleshistory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricesaleshistory = PriceSalesHistory::all();
        $branch_list = Branch::pluck('name', 'id');
        $merkall = Merk::pluck("name", "id");
        return view('admin.mokas.create', compact('branch_list', 'merkall', 'pricesaleshistory'));
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
            'purchase_price'=>'required',
            'selling_price'=>'required',
            'stnk'=>'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required',
            'plat' => 'required',
            'kilometers' => 'required',
            'period_tax' => 'required',
            'stnk_due_date' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mokas = new Mokas();
        $mokas->id = Uuid::uuid4()->getHex();
        $mokas->mokas_no = mokas::Maxno();
        $mokas->merk_id = $request->input('merk_id');
        $mokas->type_id = $request->input('type_id');
        $mokas->purchase_price = $request->input('purchase_price');
        $mokas->selling_price = $request->input('selling_price');
        $mokas->discount = $request->input('discount');
        $mokas->manufacture_year = $request->input('manufacture_year');
        $mokas->stnk = $request->input('stnk');
        $mokas->bpkb = $request->input('bpkb');
        $mokas->machine_number = $request->input('machine_number');
        $mokas->chassis_number = $request->input('chassis_number');
        $mokas->plat = $request->input('plat');
        $mokas->kilometers = $request->input('kilometers');
        $mokas->stnk_due_date = $request->input('stnk_due_date');
        $mokas->period_tax = $request->input('period_tax');
        $mokas->note = $request->input('note');
        $mokas->branch_id = $request->input('branch_id');
        $mokas->cek_ok = $request->input('cek_ok');
        $mokas->sales_id = $request->input('sales_id');
        $mokas->user_id = $request->input('user_id');
        $mokas->save();

        if (!$mokas) {
            return redirect()->back()->withInput()->withError('cannot create mokas');
        }else{
            return redirect('/admin/mokas')->with('success', 'Successfully create mokas');
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
        $mokas = Mokas::find($id);
        $merkall = Merk::pluck("name", "id");
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.mokas.edit', compact('mokas', 'branch_list', 'merkall'));
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
        $validator = validator::make($request->all(), [
            'mokas_no'=>'required',
            'purchase_price'=>'required',
            'selling_price'=>'required',
            'stnk'=>'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required',
            'plat' => 'required',
            'kilometers' => 'required',
            'period_tax' => 'required',
            'stnk_due_date' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mokas = Mokas::find($id);
        $mokas->update($request->all());

        if (!$mokas) {
            return redirect()->back()->withInput()->withError('Cannot Update Mokas');
        }else{
            return redirect('/admin/mokas')->with('success', 'Success update Mokas');
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

        foreach($request->input('id') as $key => $value) {
            $mokas = Mokas::find($value);
            $mokas->delete();
        }

        if (!$mokas) {
            return redirect()->back()->withInput()->withError('cannot delete mokas');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Mokas');
        }
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
