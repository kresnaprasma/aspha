<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [ 'motor_no', 'merk',	'type',
    	'post_name', 'post_price','fitur', 'condition', 
        'description', 'status', 'cash_method',
        'supplier_no', 'branch_id'
    ];

    public $incrementing =  false;

    public function merks()
    {
        return $this->belongsTo("App\Merk", "merk", "id");
    }

    public function types()
    {
        return $this->belongsTo("App\Type", "type", "id");
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');    
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`motor_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('motor_no', 'asc')
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

        return 'MOT'.$year.date('m').$kd_fix;

    }
}
