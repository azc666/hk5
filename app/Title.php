<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'type', 'title',
    ];

    protected $guarded = [];
}
