<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primarykey = 'id';

    public $incrementing = false;
    
    protected $fillable = [
        'id',
    	'name',
    	'merk_id',
    ];

    public function merk()
    {
    	return $this->belongsTo('App\Merk');
    }

    public function vehiclecollateral()
    {
        return $this->hasMany('App\VehicleCollateral');
    }

    public function loan()
    {
        return $this->hasMany('App\Loan');
    }

    public function motor()
    {
        return $this->hasMany('App\Motor');
    }
}