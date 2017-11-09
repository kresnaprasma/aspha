<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MokasChecklist extends Model
{
    protected $fillable = ['mokascheck_no', 'mokas_no', 'mesin', 'karburator', 'tutup_oli',
		'kabel_busi', 'knalpot', 'standar', 'kickstater', 'pijakan_rem', 'pijakan_perseneleng', 'footstep_depan', 
		'footstep_belakang', 'rantai', 'tutup_rantai','swingarm', 'gear_belakang','rem_depan', 'rem_belakang',
		'shock_depan', 'shock_belakang','velg_depan', 'velg_belakang', 'tanki_bensin', 'cakram_rem', 'tutup_tanki_bensin', 
		'kunci_kontak', 'speedo_meter', 'riting_depan','riting_belakang', 'lampu_depan', 'lampu_belakang', 
		'stang', 'spion', 'slebor_depan', 'slebor_belakang', 'fairing', 'front_guard_sayap', 'body', 
		'stripbody', 'stnk', 'toolkit', 'filter_udara', 'pegangan_belakang', 'peredam_gas', 'klakson' ];

	public $incrementing = false;

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select(DB::raw('SUBSTRING(`mokascheck_no` ,8) AS kd_max'))
            ->where(DB::raw('MONTH(created_at)'), '=', date('m'))
            ->where(DB::raw('YEAR(created_at)'), '=', date('Y'))
            ->orderBy('mokascheck_no', 'asc')
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

        return 'CEK'.$year.date('m').$kd_fix;
    }

    public function mokas()
    {
    	return $this->belongsTo('App\Mokas', 'mokas_no', 'mokas_no');
    }
}
