<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyPart extends Model
{
    protected $fillable = ['name'];

    protected function exercise()
    {
        return $this->hasMany(Exercise::class,'part_id');
    }

}
