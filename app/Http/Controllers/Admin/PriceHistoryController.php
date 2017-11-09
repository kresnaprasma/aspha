<?php

namespace App\Http\Controllers\Admin;

use App\PriceHistory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PriceHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricehistory = PriceHistory::all();
        $mokas_list =  Mokas::pluck('chassis_number', 'id');
        return view('admin.pricehistory.index', compact('pricehistory', 'mokas_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.pricehistory.create');
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
            'discount' => 'required',
            'selling_price' => 'required',
            'note' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $pricehistory = new PriceHistory();
        $pricehistory->id = Uuid::uuid4()->getHex();
        $pricehistory->selling_price = $request->input('selling_price');
        $pricehistory->discount = $request->input('discount');
        $pricehistory->note = $request->input('note');
        $pricehistory->save();

        if (!$pricehistory) {
            return redirect()->back()->withInput()->withErrors('cannot create Sales');
        } else {
            return redirect('admin/pricehistory')->with('success', 'Successfully create sales history');
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
        $pricehistory = PriceHistory::find($id);

        return view('admin.pricehistory.edit', compact('pricehistory'));
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
            'note' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $pricehistory = PriceHistory::find($id);
        $pricehistory->update($request->all());

        if (!$pricehistory) {
            return redirect()->back()->withInput()->withErrors('cannot update customer');
        } else {
            return redirect('admin/pricehistory')->with('success', 'Successfully update Price Sales');
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
            $pricehistory = PriceHistory::find($value);
            $pricehistory->delete();
        }

        if (!$pricehistory) {
            return redirect()->back()->withInput()->withError('cannot delete Price History');
        }else{
            return redirect()->back()->with('success', 'Successfully delete Price History');
        }
    }
}
