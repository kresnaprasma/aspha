<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['collateral_id',
            'merk',
            'type',
    		'vehicle_color', 
    		'vehicle_cc',
            'bpkb',
            'chassis_number',
            'machine_number', 
    		'stnk_due_date', 
    		'vehicle_date', 
    		'tenor', 
    		'price_request', 
    		'approval', 
    		'user_approval',
        ];

    public function vehiclecollaterals()
    {
    	return $this->belongsTo("App\VehicleCollateral", "collateral_id", "id");
    }

    public function user_approvals()
    {
        return $this->belongsTo("App\User", "user_approval", "id");
    }

    public function merks()
    {
        return $this->belongsTo("App\Merk", "merk", "id");
    }

    public function types()
    {
        return $this->belongsTo("App\Type", "type", "id");
    }
}