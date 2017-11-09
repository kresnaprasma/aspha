<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadmotor extends Model
{
    protected $fillable = ['filename', 'mime', 'original_filename', 'nameslug', 'slugwithoutExt', 'mokas_no'];

    public function mokas()
    {
		return $this->belongsTo('App\Mokas', 'mokas_no', 'mokas_no');
    }
}
