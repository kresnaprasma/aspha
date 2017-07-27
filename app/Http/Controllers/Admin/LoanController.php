<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Merk;
use App\Loan;
use App\VehicleCollateral;
use App\Type;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Facades\Input;
use Excel;
use PDF;
use Elibyy\TCPDF\Facades\TCPDF;

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
        return view('admin.loan.create', compact('merkall'));
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
        $merk_id = $request->input('merk');
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
        $request->request->add(['user_approval' => auth()->user()->id]);
        Loan::create($request->all());
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
        $loan = Loan::find($id);
        return view('admin.loan.edit', compact('loan', 'id', 'merkall'));
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
        
        $edit = Loan::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Loan Updated Successfully');
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

    /*public function export()
    {
        $loans = Loan::all();
        Excel::create('loans', function($excel) use($loans) {
            $excel->sheet('ExportFile', function($sheet) use($loans) {
                $sheet->fromArray($loans);
            });
        })->export('xls');
    }*/

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