<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Type;
use App\Merk;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $types = Type::all();
        $merks = Merk::pluck('name', 'id');
        return view('admin.master.type.index', compact('types', 'merks'));
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
        Type::create($request->all());

        return redirect()->back()->with('Success', 'Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
/*        $edit = Type::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Type updated successfully');*/
        $edit = Type::find($id)->update($request->all());

        return redirect()->back()->with('Success', 'Type updated Successfully');
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
            Type::find($value)->delete();
        }
        
        return redirect()->back()->with('Success', "Type deleted successfully");
    }
}
