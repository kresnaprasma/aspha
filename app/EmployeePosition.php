<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    protected $fillable = ['id','name','department_id'];
    
    public $incrementing = false;

    public function departement()
    {
    	return $this->belongsTo('App\Departement');
    }
}
