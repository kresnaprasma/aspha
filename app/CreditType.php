<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditType extends Model
{
    protected $fillable = ['name'];

    public function cash()
    {
    	return $this->hasMany('App\Cash', 'id');
    }
}
