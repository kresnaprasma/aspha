<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashfix extends Model
{
    protected $fillable = ['tenor_approve', 'payment', 'approve_date', 'leasing_no', 'cash_no'];
}
