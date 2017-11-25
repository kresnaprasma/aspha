<?php

namespace App\Http\Controllers\Admin;

use App\Mokas;
use App\Branch;
use App\Merk;
use App\Type;
use App\Customer;
use App\Leasing;
use App\PriceSalesHistory;
use App\MokasChecklist;

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
        $mokaschecklist = MokasChecklist::all();
        $pricesaleshistory = PriceSalesHistory::all();
        $branch_list = Branch::pluck('name', 'id');
        $merkall = Merk::pluck("name", "id");
        return view('admin.mokas.create', compact('branch_list', 'merkall', 'pricesaleshistory', 'mokaschecklist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = validator::make($request->all(), [
            'purchase_price'=>'required',
            'selling_price'=>'required',
            'stnk'=>'required',
            'bpkb' => 'required',
            'machine_number' => 'required',
            'chassis_number' => 'required',
            'plat' => 'required',
            'stnk_due_date' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mokas = new Mokas();
        $mokas->id = Uuid::uuid4()->getHex();
        $mokas->mokas_no = Mokas::Maxno();
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


        $checklist = new MokasChecklist();
        $checklist->id = Uuid::uuid4()->getHex();
        $checklist->mokascheck_no = MokasChecklist::Maxno();
        $checklist->mokas_no = $request->input('mokas_no');
        $checklist->mesin = $request->input('mesin');
        $checklist->knalpot = $request->input('knalpot');
        $checklist->tutup_oli = $request->input('tutup_oli');
        $checklist->kabel_busi = $request->input('kabel_busi');
        $checklist->karburator = $request->input('karburator');
        $checklist->standar = $request->input('standar');
        $checklist->kickstater = $request->input('kickstater');
        $checklist->pijakan_rem = $request->input('pijakan_rem');
        $checklist->pijakan_perseneleng = $request->input('pijakan_perseneleng');
        $checklist->footstep_depan = $request->input('footstep_depan');
        $checklist->footstep_belakang = $request->input('footstep_belakang');
        $checklist->rantai = $request->input('rantai');
        $checklist->tutup_rantai = $request->input('tutup_rantai');
        $checklist->swingarm = $request->input('swingarm');
        $checklist->gear_belakang = $request->input('gear_belakang');
        $checklist->rem_depan = $request->input('rem_depan');
        $checklist->rem_belakang = $request->input('rem_belakang');
        $checklist->shock_depan = $request->input('shock_depan');
        $checklist->shock_belakang = $request->input('shock_belakang');
        $checklist->velg_depan = $request->input('velg_depan');
        $checklist->velg_belakang = $request->input('velg_belakang');
        $checklist->tanki_bensin = $request->input('tanki_bensin');
        $checklist->cakram_rem = $request->input('cakram_rem');
        $checklist->tutup_tanki_bensin = $request->input('tutup_tanki_bensin');
        $checklist->kunci_kontak = $request->input('kunci_kontak');
        $checklist->speedo_meter = $request->input('speedo_meter');
        $checklist->riting_depan = $request->input('riting_depan');
        $checklist->riting_belakang = $request->input('riting_belakang');
        $checklist->lampu_depan = $request->input('lampu_depan');
        $checklist->lampu_belakang = $request->input('lampu_belakang');
        $checklist->stang = $request->input('stang');
        $checklist->spion = $request->input('spion');
        $checklist->slebor_depan = $request->input('slebor_depan');
        $checklist->slebor_belakang = $request->input('slebor_belakang');
        $checklist->fairing = $request->input('fairing');
        $checklist->front_guard_sayap = $request->input('front_guard_sayap');
        $checklist->body = $request->input('body');
        $checklist->stripbody = $request->input('stripbody');
        $checklist->stnk = $request->input('stnk');
        $checklist->toolkit = $request->input('toolkit');
        $checklist->filter_udara = $request->input('filter_udara');
        $checklist->pegangan_belakang = $request->input('pegangan_belakang');
        $checklist->peredam_gas = $request->input('peredam_gas');
        $checklist->klakson = $request->input('klakson');
        $checklist->save();

        if (!$mokas) {
            return redirect()->back()->withInput()->withError('cannot create mokas');
        }else{
            return redirect('/mokas')->with('success', 'Successfully create mokas');
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
        // $checklist = MokasChecklist::find($id);
        $merkall = Merk::pluck("name", "id");
        $branch_list = Branch::pluck('name', 'id');

        return view('admin.mokas.edit', compact('mokas', 'branch_list', 'merkall', 'checklist'));
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
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $mokas = Mokas::find($id);
        $mokas->update($request->all());

        $checklist = MokasChecklist::find($id);
        // $checklist->update($request->all());
        $checklist->mokascheck_no = $request->input('mokascheck_no');
        $checklist->mokas_no = $request->input('mokas_no');
        $checklist->mesin = $request->input('mesin');
        $checklist->knalpot = $request->input('knalpot');
        $checklist->tutup_oli = $request->input('tutup_oli');
        $checklist->kabel_busi = $request->input('kabel_busi');
        $checklist->karburator = $request->input('karburator');
        $checklist->standar = $request->input('standar');
        $checklist->kickstater = $request->input('kickstater');
        $checklist->pijakan_rem = $request->input('pijakan_rem');
        $checklist->pijakan_perseneleng = $request->input('pijakan_perseneleng');
        $checklist->footstep_depan = $request->input('footstep_depan');
        $checklist->footstep_belakang = $request->input('footstep_belakang');
        $checklist->rantai = $request->input('rantai');
        $checklist->tutup_rantai = $request->input('tutup_rantai');
        $checklist->swingarm = $request->input('swingarm');
        $checklist->gear_belakang = $request->input('gear_belakang');
        $checklist->rem_depan = $request->input('rem_depan');
        $checklist->rem_belakang = $request->input('rem_belakang');
        $checklist->shock_depan = $request->input('shock_depan');
        $checklist->shock_belakang = $request->input('shock_belakang');
        $checklist->velg_depan = $request->input('velg_depan');
        $checklist->velg_belakang = $request->input('velg_belakang');
        $checklist->tanki_bensin = $request->input('tanki_bensin');
        $checklist->cakram_rem = $request->input('cakram_rem');
        $checklist->tutup_tanki_bensin = $request->input('tutup_tanki_bensin');
        $checklist->kunci_kontak = $request->input('kunci_kontak');
        $checklist->speedo_meter = $request->input('speedo_meter');
        $checklist->riting_depan = $request->input('riting_depan');
        $checklist->riting_belakang = $request->input('riting_belakang');
        $checklist->lampu_depan = $request->input('lampu_depan');
        $checklist->lampu_belakang = $request->input('lampu_belakang');
        $checklist->stang = $request->input('stang');
        $checklist->spion = $request->input('spion');
        $checklist->slebor_depan = $request->input('slebor_depan');
        $checklist->slebor_belakang = $request->input('slebor_belakang');
        $checklist->fairing = $request->input('fairing');
        $checklist->front_guard_sayap = $request->input('front_guard_sayap');
        $checklist->body = $request->input('body');
        $checklist->stripbody = $request->input('stripbody');
        $checklist->stnk = $request->input('stnk');
        $checklist->toolkit = $request->input('toolkit');
        $checklist->filter_udara = $request->input('filter_udara');
        $checklist->pegangan_belakang = $request->input('pegangan_belakang');
        $checklist->peredam_gas = $request->input('peredam_gas');
        $checklist->klakson = $request->input('klakson');
        $checklist->save();

        if (!$mokas) {
            return redirect()->back()->withInput()->withError('Cannot Update Mokas');
        }else{
            return redirect('/mokas')->with('success', 'Success update Mokas');
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
