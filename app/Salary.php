<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;

    protected $table = 'salary';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function person(){
        return $this->hasMany('App\Person');
    }
}
