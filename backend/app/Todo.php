<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title', 'text', 'status', 'deadline',
    ];

    protected $dates = [
        'deadline',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function todo_category()
    {
        return $this->belongsTo('App\TodoCategory');
    }
}
