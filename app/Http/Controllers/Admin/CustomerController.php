<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Facades\Input;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
            'ktp_number' => 'unique|required|numeric',
            'familycard_number' => 'required|numeric',
            'fullname' => 'required',
            'address', => 'required',
            'post_code' => 'required|numeric',
            'birth_date' => 'required',
            'job' => 'required',
            'company_address' => 'required',
            'handphone' => 'required',
            'salary' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ],[
            'ktp_number.unique' => 'KTP anda sudah terdaftar',
            'ktp_number.required' => 'No. KTP wajib diisi',
            'ktp_number.numeric' => 'Hanya diisi dengan angka',
            'familycard_number.required' => 'No. Kartu Keluarga wajib diisi',
            'familycard_number.numeric' => 'Hanya diisi dengan angka',
            'fullname.required' => 'Nama langkap wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'post_code.required' => 'Kode Post wajib diisi',
            'post_code.numeric' => 'Hanya diisi dengan angka',
            'birth_date.required' => 'Wajib mengisikan tanggal lahir',
            'job.required' => 'Pekerjaan wajib diisi',
            'company_address.required' => 'Alamat kantor wajib diisi',
            'handphone.required' => 'No. Handphone wajib diisi',
            'salary.required' => 'Gaji Wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Harus diisi dengan email yang valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal diisi dengan 6 karakter',
            'password.max' => 'Maksimal diisi dengan 20 karakter'
        ]);

        Customer::create($request->all());
        return redirect()->back()->with('Success', 'Customer Created Successfully');
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
        $edit = Customer::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Customer updated Successfully');
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
            Customer::find($value)->delete();
        }

        return redirect()->back()->with('Success', 'Customer deleted successfully');
    }
}
