<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadsales extends Model
{
    protected $fillable = ['filename', 'mime', 'original_filename', 'nameslug', 'slugwithoutExt', 'sales_no'];

    public function sales()
    {
		return $this->belongsTo('App\Sales', 'sales_no', 'sales_no');
    }
}
