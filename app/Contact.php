<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $casts = [
        'complete' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $table = 'contact_us';
    public $timestamps = true;
}
