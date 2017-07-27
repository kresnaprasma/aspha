<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public static $rules = [
		'file' => 'required|mime:png, gif, jpeg, jpg, bmp'
	];

	public static $messages = [
		'file.mimes' => 'Uploaded file not in image format',
		'file.required' => 'Image is required'
	];

	protected $fillable = [
		'original_name',
		'filename',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo("App\User", 'user_id', 'id');
	}
}
