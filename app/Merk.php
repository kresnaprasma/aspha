<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = ['name'];

    public function type()
    {
    	return $this->hasMany("App\Type");
    }

    public function vehiclecollateral()
    {
    	return $this->hasMany("App\VehicleCollateral");
    }

    public function loan()
    {
    	return $this->hasMany("App\Loan");
    }

    public function mokas()
    {
        return $this->hasMany("App\Mokas");
    }

    public function pricesaleshistory()
    {
        return $this->hasMany('App\PriceSalesHistory');
    }
}
