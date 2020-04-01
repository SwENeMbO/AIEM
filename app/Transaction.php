<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'typeID'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
	{
		return $this->hasOne('App\Type');
    }
}
