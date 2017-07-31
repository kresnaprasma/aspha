<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UploadCustomer extends Model
{
    protected $fillable = ['filename', 'mime', 'original_filename', 'customercollateral_no'];

    public function customercollateral()
    {
    	return $this->('App\CustomerCollateral');
    }
}
