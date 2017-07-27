<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.master.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id');

        return view('admin.master.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $user = User::create([
            'name'=> $request->input('name'),
            'email' => $request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);

        $user->roles()->sync($request->input('role_id'));

        return redirect()->back()->with('success', 'Successfully create user');
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
        $user = User::find($id);
        $roles = Role::pluck('name','id');

        return view('admin.master.user.edit', compact('user','roles'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if(!empty($request->input('password'))){
            $user->password = $request->input('password');
        }

        $user->save();
        $user->roles()->sync($request->input('role_id'));

        return redirect('admin/master/user')->with('success', 'Successfully update user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/master/user')->with('success', 'Successfully delete user');
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach ($request->input('id') as $key => $value) {
            $user = User::find($value);
            $user->delete();
        }

        return redirect('admin/master/user')->with('success', 'Successfully delete user');
    }
}
