<?php

namespace App\Http\Controllers\Admin;

use App\PriceSalesHistory;
use App\Merk;
use App\Type;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PriceSalesHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleshistories = PriceSalesHistory::all();
        return view('admin.pricesaleshistory.index', compact('saleshistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merkall = Merk::pluck("name", "id");
        return view('admin.pricesaleshistory.create', compact('merkall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validator = validator::make($request->all(), [
            'discount' => 'required',
            'selling_price' => 'required',
            'merk_id' => 'required',
            'type_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $saleshistory = new PriceSalesHistory();
        $saleshistory->id = Uuid::uuid4()->getHex();
        $saleshistory->pricesaleshistory_no = PriceSalesHistory::Maxno();
        $saleshistory->merk_id = $request->input('merk_id');
        $saleshistory->type_id = $request->input('type_id');
        $saleshistory->discount = $request->input('discount');
        $saleshistory->selling_price = $request->input('selling_price');
        $saleshistory->save();

        if (!$saleshistory) {
            return redirect()->back()->withInput()->withErrors('cannot create Sales');
        } else {
            return redirect('admin/pricesaleshistory')->with('success', 'Successfully create sales history');
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

        $pricesaleshistory = PriceSalesHistory::find($id);

        $merkall = Merk::pluck("name", "id");
        return view('admin.pricesaleshistory.edit', compact('pricesaleshistory', 'merkall'));
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
            'discount' => 'required',
            'selling_price' => 'required',
            'merk_id' => 'required',
            'type_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $pricesaleshistory = PriceSalesHistory::find($id);
        $pricesaleshistory->update($request->all());

        if (!$pricesaleshistory) {
            return redirect()->back()->withInput()->withErrors('cannot update customer');
        } else {
            return redirect('admin/pricesaleshistory')->with('success', 'Successfully update Price Sales');
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
            $saleshistories = PriceSalesHistory::find($value);
            $saleshistories->delete();
        }

        if (!$saleshistories) {
            return redirect()->back()->withInput()->withError('cannot delete Price History');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Price History');
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
}
