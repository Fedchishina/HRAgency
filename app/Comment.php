<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $casts = [
        'moderated' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    public $timestamps = true;
}
