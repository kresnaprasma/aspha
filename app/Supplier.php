<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    protected $fillable = ['supplier_no','name','email','address','phone','npwp','pic_name','pic_phone','account_no','account_name','bank_id','bank_branch','branch_id'];

    public $incrementing = false;

    public function bank()
    {
    	return $this->belongsTo('App\Bank');
    }

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`supplier_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('supplier_no', 'asc')
            ->get();

        $arr1 = array();
        if ($queryMax->count() > 0) {
            foreach ($queryMax as $k=>$v)
            {
                $arr1[$k] = (int)$v->kd_max;
            }
            $arr2 = range(1, max($arr1));
            $missing = array_diff($arr2, $arr1);
            if (empty($missing)) {
                $tmp = end($arr1) + 1;
                $kd_fix = sprintf("%04s", $tmp);
            }else{
                $kd_fix = sprintf("%04s", reset($missing));
            }
        }
        else{
            $kd_fix = '0001';
        }

        return 'SUP'.$year.date('m').$kd_fix;

    }
}
