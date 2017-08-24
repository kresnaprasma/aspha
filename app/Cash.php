<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cash extends Model
{
    protected $fillable = ['cash_no', 'credit_ceiling_request', 'tenor_request', 'customer_no', 'leasing_no', 'branch_id', 'user_id'];

    public $incrementing = false;

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`cash_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('cash_no', 'asc')
            ->get();

        $array1 = array();
        if ($queryMax->count() > 0) {
            foreach ($queryMax as $k=>$v)
            {
                $array1[$k] = (int)$v->kd_max;
            }
            $array2 = range(1, max($array1));
            $missing = array_diff($array2, $array1);
            if (empty($missing)) {
                $tmp = end($array1) + 1;
                $kd_fix = sprintf("%04s", $tmp);
            }else{
                $kd_fix = sprintf("%04s", reset($missing));
            }
        }
        else{
            $kd_fix = '0001';
        }

        return 'DTN'.$year.date('m').$kd_fix;
	}

    public function leasing()
    {
        return $this->hasMany('App\Leasing');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function cashfix()
    {
        return $this->hasOne('App\Cashfix');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_no','customer_no');
    }

    public function customerCollateral()
    {
        return $this->belongsTo('App\CustomerCollateral', 'customer_no','customer_no');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
