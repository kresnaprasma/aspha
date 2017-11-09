<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nip','name','alias','email','facebook_account','instagram_account','address','city','kelurahan','kecamatan','province','birthday','birthplace','phone','marrital','blood_type','zipcode','gender','bank_account','npwp','bank_branch','bank_name','job_status','job_start','job_end','branch_id','department_no','position_no','grade','mother_name','is_user'];

    public $incrementing = false;

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }

    public function department()
    {
    	return $this->belongsTo('App\EmployeeDepartment','department_no','department_no');
    }

    public function position()
    {
    	return $this->belongsTo('App\EmployeePosition','position_no','position_no');
    }

    public function pictures()
    {
        return $this->hasMany('App\EmployeePicture','nip','nip');
    }

    public function scopeMaxno($query)
    {
        $year=substr(date('Y'), 2);
        $queryMax =  $query->select('nip')
            ->orderBy('nip', 'asc')
            ->get();

        $arr1 = array();
        if ($queryMax->count() > 0) {
            foreach ($queryMax as $k=>$v)
            {
                $arr1[$k] = (int)$v->nip;
            }

            $arr2 = range(1001, max($arr1));
            
            $missing = array_diff($arr2, $arr1);
            
            if (empty($missing)) {
                $tmp = end($arr1) + 1;
                $kd_fix = $tmp;
            }else{
                $kd_fix = reset($missing);
            }
        }
        else{
            $kd_fix = '1001';
        }

        return $kd_fix;
    }
}
