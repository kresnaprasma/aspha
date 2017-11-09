<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePicture extends Model
{
    protected $fillable = ['nip','filename','original_name','filetype','filesize'];

    public $incrementing = false;

    public function employee()
    {
    	return $this->belongsTo('App\Employee', 'nip','nip');
    }
}
