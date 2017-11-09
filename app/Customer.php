<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $fillable = ['customer_no','name','address','email','phone','active','branch_id','birthdate','birthplace','identity_number','gender','rt','rw','postalcode','kelurahan','kecamatan','kabupaten','city','province','kk_number'];

    public $incrementing = false;
    
    public function customer_collateral()
    {
        return $this->hasMany('App\Customercollateral');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function cash()
    {
        return $this->hasMany('App\Cash', 'customer_no', 'customer_no');
    }

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`customer_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('customer_no', 'asc')
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

        return 'CRM'.$year.date('m').$kd_fix;

    }
}
