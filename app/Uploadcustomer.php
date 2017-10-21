<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uploadcustomer extends Model
{
    protected $fillable = ['filename', 'mime', 'original_filename', 'nameslug', 'slugwithoutExt', 'customercollateral_no'];

    public function customercollateral()
    {
		return $this->belongsTo('App\Customercollateral', 'customercollateral_no', 'customercollateral_no');
    }
}
