<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
    	'merk',
    	'type',
    	'post_name',
    	'post_price',
    	'fitur',
    	'stnk_address',
    	'condition',
    	'description',
        'status',
    ];

    public function merks()
    {
        return $this->belongsTo("App\Merk", "merk", "id");
    }

    public function types()
    {
        return $this->belongsTo("App\Type", "type", "id");
    }
}
