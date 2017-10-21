<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PriceSalesHistory extends Model
{
    protected $fillable = ['id', 'pricesaleshistory_no', 'merk_id', 'type_id', 'selling_price', 'discount'];

    public $incrementing = false;

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`pricesaleshistory_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('pricesaleshistory_no', 'asc')
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

        return 'PSH'.$year.date('m').$kd_fix;
	}

    public function types()
    {
        return $this->belongsTo("App\Type", "type_id", "id");
    }

    public function merks()
    {
        return $this->belongsTo("App\Merk", "merk_id", "id");
    }
}
