<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{
    protected $fillable = ['mokas_number', 'selling_price', 'discount', 'note', 'change_date'];

    public function mokas()
    {
        return $this->belongsTo("App\Mokas", "mokas_number", "mokas_no");
    }
}
