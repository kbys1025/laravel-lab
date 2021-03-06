<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
