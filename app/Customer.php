<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = 
    [
    	'ktp_number',
    	'familycard_number',
    	'fullname',
    	'address',
    	'post_code',
    	'birth_date',
    	'job',
        'company_address',
    	'handphone',
    	'salary',
    	'email',
    	'password',
    ];

/*    public function loans()
    {
    	return $this->hasMany("App\Loan");
    }*/
}
