<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\MokasChecklist;

class MokasChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist = MokasChecklist::all();

        return response()->json([
            'data'=>$this->transformCollection($checklist)
        ], 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checklist = MokasChecklist::where('mokascheck_no', $id)->first();

        if (!$checklist) {
            return response()->json([
                'error'=>[
                    'message' => 'Customer does not exist'
                ]
            ], 404);
        }

        return response()->json([
            'data'=>$this->transform($checklist)
        ], 200);
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
        //
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

    public function transformCollection($checklists){
        return array_map([$this, 'transform'], $checklists->toArray());
    }

    public function transform($checklist){
        return [
            'mokaschecklist_id' => $checklist['id'],
            'mokaschecklist_no' => $checklist['mokascheck_no'],
            'mokaschecklist_mokas_no' => $checklist['mokas_no']
        ];
    }
}
