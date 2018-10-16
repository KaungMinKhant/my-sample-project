<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
	protected $fillable = ['name',
	'slug',
	'user_id'];
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
