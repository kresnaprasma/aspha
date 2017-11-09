<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDepartment extends Model
{
    protected $fillable = ['id','name'];

    public $incrementing = false;

    public function employee()
    {
    	return $this->hasMany('App\Employee');
    }
}
