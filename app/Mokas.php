<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mokas extends Model
{
    protected $fillable = ['mokas_no', 'merk_id', 'type_id', 'purchase_price', 'selling_price', 'discount', 'stnk', 'bpkb', 'machine_number', 'plat', 'manufacture_year', 'kilometers', 'stnk_due_date', 'period_tax', 'note', 'branch_id', 'cek_ok', 'sales_id', 'user_id'];

    public $incrementing = false;

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`mokas_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('mokas_no', 'asc')
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

        return 'MOK'.$year.date('m').$kd_fix;

    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function merks()
    {
        return $this->belongsTo('App\Merk', 'merk_id', 'id');
    }

    public function types()
    {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

    public function pricehistory()
    {
        return $this->hasMany('App\PriceHistory');
    }
    
    public function sales()
    {
        return $this->hasMany('App\Sales');
    }

    public function mokaschecklist()
    {
        return $this->hasOne('App\MokasChecklist');
    }
}
