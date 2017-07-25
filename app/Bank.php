<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name','alias'];

    public function suppliers()
    {
    	return $this->hasMany('App\Supplier');
    }
}
