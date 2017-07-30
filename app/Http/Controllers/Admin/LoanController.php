<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Merk;
use App\Loan;
use App\VehicleCollateral;
use App\Type;
use App\Branch;
use App\Customer;
use App\User;

use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use DB;
use Illuminate\Facades\Input;
use Excel;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        return view('admin.loan.index', compact('loans'));
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
        $customer_list = Customer::pluck('name', 'id');
        return view('admin.loan.create', compact('merkall', 'customer_list', 'branch_list'));
    }

    public function myformAjax($id)
    {
        $typeall = Type::where("merk_id", $id)
                ->pluck("name", "name");
        return json_encode($typeall);
    }

    public function myformEdit($id)
    {
        $typeedit = Type::where("merk_id", $id)
                ->pluck("name", "name");
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
                'vehicle_color' => 'required',
                'vehicle_cc' => 'required|numeric',
                'bpkb' => 'required|min:10|max:10',
                'chassis_number' => 'required|unique:loans|min:17|max:17',
                'machine_number' => 'required|unique:loans|min:12|max:12',
                'stnk_due_date' => 'required',
                'vehicle_date' => 'required',
                'tenor' => 'required',
                'price_request' => 'required|numeric',
            ],[
                'merk.required' => 'Kolom merk harus diisi',
                'type.required' => 'Kolom type harus diisi',
                'vehicle_color.required' => 'Warna motor harus diisi',
                'vehicle_cc.required' => 'CC Motor wajib diisi',
                'bpkb.required' => 'Kolom BPKB wajib diisi',
                'bpkb.min' => 'BPKB wajib 10 karakter',
                'bpkb.max' => 'Terlalu banyak karakter yang dimasukkan',
                'chassis_number.unique' => 'Nomor angka sudah terdaftar',
                'chassis_number.required' => 'Nomor Rangka harus diisi',
                'chassis_number.min' => 'Wajib diisi dengan 17 karakter',
                'chassis_number.max' => 'Wajib diisi dengan 17 karakter',
                'machine_number.unique' => 'Nomor mesin sudah terdaftar',
                'machine_number.required' => 'Nomor mesin harus diisi',
                'machine_number.min' => 'Wajib diisi dengan 12 karakter', 
                'machine_number.max' => 'Wajib diisi dengan 12 karakter',
                'stnk_due_date.required' => 'Masa berlaku pajak kendaraan harap diisi',
                'vehicle_date.required' => 'Tahun pembuatan kendaraan wajib diisi',
                'tenor' => 'Tenor Jangka waktu peminjaman harap diisi',
                'price_request.required' => 'Isilah permohonan peminjaman anda',
                'price_request.numeric' => 'Harus diisi dengan angka tanpa simbol',
        ]);
        
        $loan = new Loan();
        $loan->id = Uuid::uuid4()->getHex();
        $loan->loan_no = Loan::Maxno();

        /*$merk_id = $request->input('merk');
        $type_id = $request->input('type');
        $vehicle_date = $request->input('vehicle_date');
        
        $id = DB::select("SELECT vehicle_collaterals.id as collateral_id
                            FROM vehicle_collaterals
                            JOIN types ON vehicle_collaterals.type_id = types.id
                            WHERE vehicle_collaterals.merk_id =".$merk_id."
                            AND types.name LIKE  '".$type_id."'
                            AND YEAR( vehicle_collaterals.vehicle_date ) =  '".substr($vehicle_date,0,4)."' ");
        
        echo $id[0]->collateral_id;
        $request->request->add(['collateral_id' => $id[0]->collateral_id]);
        $request->request->add(['merk' => $merk_id]);
        $request->request->add(['type' => $type_id]);
        $request->request->add(['user_approval' => auth()->user()->id]);*/

        $loan->merk = $request->input('merk');
        $loan->type = $request->input('type');
        $loan->vehicle_color = $request->input('vehicle_color');
        $loan->vehicle_cc = $request->input('vehicle_cc');
        $loan->bpkb = $request->input('bpkb');
        $loan->chassis_number = $request->input('chassis_number');
        $loan->machine_number = $request->input('machine_number');
        $loan->stnk_due_date = $request->input('stnk_due_date');
        $loan->vehicle_date = $request->input('vehicle_date');
        $loan->tenor = $request->input('tenor');
        $loan->price_request = $request->input('price_request');
        $loan->approval->add(['approval' => auth()->user()->id]);
        $loan->user_approval = $request->input('user_approval');
        $loan->customer_id = $request->input('customer_id');
        $loan->branch_id = $request->input('branch_id');
        $loan->save();
        
        return redirect('/admin/loan')->with('Success', 'Loan Created Successfully');
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
        $branch_list = Branch::pluck('name', 'id');
        $customer_list = Customer::pluck('name', 'id');
        $loan = Loan::find($id);
        return view('admin.loan.edit', compact('loan', 'id', 'merkall', 'branch_list', 'customer_list'));
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
        $this->validate($request, [
                'merk' => 'required',
                'type' => 'required',
                'vehicle_color' => 'required',
                'vehicle_cc' => 'required|numeric',
                'bpkb' => 'required|min:10|max:10',
                'chassis_number' => 'required|unique:loan|min:17|max:17',
                'machine_number' => 'required|unique:loan|min:12|max:12',
                'stnk_due_date' => 'required',
                'vehicle_date' => 'required',
                'tenor' => 'required',
                'price_request' => 'required|numeric',
            ],[
                'merk.required' => 'Kolom merk harus diisi',
                'type.required' => 'Kolom type harus diisi',
                'vehicle_color.required' => 'Warna motor harus diisi',
                'vehicle_cc.required' => 'CC Motor wajib diisi',
                'bpkb.required' => 'Kolom BPKB wajib diisi',
                'bpkb.min' => 'BPKB wajib 10 karakter',
                'bpkb.max' => 'Terlalu banyak karakter yang dimasukkan',
                'chassis_number.unique' => 'Nomor angka sudah terdaftar',
                'chassis_number.required' => 'Nomor Rangka harus diisi',
                'chassis_number.min' => 'Wajib diisi dengan 17 karakter',
                'chassis_number.max' => 'Wajib diisi dengan 17 karakter',
                'machine_number.unique' => 'Nomor mesin sudah terdaftar',
                'machine_number.required' => 'Nomor mesin harus diisi',
                'machine_number.min' => 'Wajib diisi dengan 12 karakter', 
                'machine_number.max' => 'Wajib diisi dengan 12 karakter',
                'stnk_due_date.required' => 'Masa berlaku pajak kendaraan harap diisi',
                'vehicle_date.required' => 'Tahun pembuatan kendaraan wajib diisi',
                'tenor' => 'Tenor Jangka waktu peminjaman harap diisi',
                'price_request.required' => 'Isilah permohonan peminjaman anda',
                'price_request.numeric' => 'Harus diisi dengan angka tanpa simbol',
        ]);
        
        $loan = Loan::find($id)->update($request->all());
        if (!$loan) {
            return redirect()->back()->withInput()->withErrors('cannot update Loan');
        }else {
            return redirect('/admin/loan')->with('Success', 'Loan Updated Successfully');
        }

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
            Loan::find($value)->delete();
       }
        return redirect()->back()->with('Success', 'Loan deleted Successfully');
    }

    public function downloadExcel()
    {
        $data = Loan::get()->toArray();
        return Excel::create('Daftar Peminjaman', function($excel) use ($data) {
            $excel->sheet('Sheet1', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

}