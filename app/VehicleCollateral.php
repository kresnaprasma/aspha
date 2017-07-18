<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleCollateral extends Model
{
    protected $fillable = ['merk_id',
    		'type_id',
    		'vehicle_date',
    		'vehicle_price'
    	];

    public function types()
    {
    	return $this->belongsTo("App\Type", "type_id", "id");
    }

    public function merks()
    {
        return $this->belongsTo("App\Merk", "merk_id", "id");
    }
    public function loans()
    {
        return $this->hasMany("App\Loan", 'id', 'collateral_id');
    }
}
