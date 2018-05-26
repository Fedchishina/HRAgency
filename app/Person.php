<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    protected $table = 'persons';
    protected $casts = [
        'children' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function persons_info()
    {
        return $this->hasOne('App\PersonInfo');
    }

    public function salary(){
        return $this->belongsTo('App\Salary');
    }

    public function parent(){
        return $this->hasOne('App\Person', 'id', 'parent')->select(['id','parent']);
    }

    public function parents(){
        return $this->parent()->with('parents');
    }
}
