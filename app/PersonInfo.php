<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonInfo extends Model
{
    use SoftDeletes;

    protected $table = 'persons_info';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'person_id',
        'id'
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function image(){
        return $this->hasOne('App\Image', 'id', 'image_id');
    }
}
