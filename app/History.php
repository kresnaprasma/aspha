<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    protected $fillable = ['history_no','note', 'customer_no', 'cash_no'];

    public $incrementing = false;

    public function scopeMaxno($query)
    {
    	$year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`history_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('history_no', 'asc')
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

        return 'HIS'.$year.date('m').$kd_fix;
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function cash()
    {
    	return $this->belongsTo('App\Cash');
    }
}
