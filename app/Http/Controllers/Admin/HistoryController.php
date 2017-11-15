<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Cash;
use App\History;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::all();
        return view('loan.history.index', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_list = Customer::pluck('name', 'customer_no');
        $cash_list = Cash::pluck('cash_no', 'id');
        return view('loan.history.create', compact('customer_list', 'cash_list'));
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
            'note' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $history = new History();
        $history->id = Uuid::uuid4()->getHex();
        $history->history_no = History::Maxno();
        $history->note = $request->input('note');
        $history->customer_no = $request->input('customer_no');
        $history->cash_no = $request->input('cash_no');
        $history->save();

        if (!$history) {
            return redirect()->back()->withInput()->withErrors('cannot create history');
        }else{
            return redirect('/loan/history')->with('success', 'Successfully create History');
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
        $history = History::find($id);
        $customer_list = Customer::pluck('name', 'customer_no');
        $cash_list = Cash::pluck('cash_no', 'id');

        return view('loan.history.edit', compact('history', 'customer_list', 'cash_list'));
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
            'note' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $history = History::find($id);
        $history->update($request->all());

        if (!$history) {
            return redirect()->back()->withInput()->withErrors('Cant update History');
        }else{
            return redirect('loan/history')->with('Success', 'Successfully update History');
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
            'id'=>'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach ($request->input('id') as $key => $value) {
            $history = History::find($value);
            $history->delete();
        }

        if (!$history) {
            return redirect()->back()->withInput()->withErrors('cannot delete history');
        }else{
            return redirect()->back()->with('success', 'Successfully delete history');
        }
    }
}
