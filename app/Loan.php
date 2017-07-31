<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    protected $fillable = [
            'merk', 'type', 'vehicle_color', 
    		'vehicle_cc', 'bpkb', 'chassis_number',
            'machine_number', 'stnk_due_date', 
    		'vehicle_date', 'tenor', 'price_request', 
    		'approval', 'user_approval',
        ];

    public $incrementing = false;

    public function scopeMaxno($query)
    {
        $year=substr('Y', 2);
        $queryMax = $query->select(DB::raw('SUBSTRING(`loan_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('loan_no', 'asc')
            ->get();

        $arr1 = array();
        if ($queryMax->count() > 0) {
            foreach ($queryMax as $k => $v) 
            {
                $arr1[$k] = (int)$v->kd_max;
            }
            $arr2 = range(1, max($arr1));
            $missing = array_diff($arr2, $arr1);
            if (empty($missing)) 
            {
                $tmp = end($arr1) + 1;
                $kd_fix = sprintf("%04s", $tmp);
            }else{
                $kd_fix = sprintf("%04s", reset($missing));
            }
        }else{
            $kd_fix = '0001';
        }
        return 'LOAN'.$year.date('m').$kd_fix;
    }

    public function vehiclecollaterals()
    {
    	return $this->belongsTo("App\VehicleCollateral", "collateral_id", "id");
    }

    public function user_approvals()
    {
        return $this->belongsTo("App\User", "user_approval", "id");
    }

    public function customers()
    {
        return $this->belongsTo("App\Customer");
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