<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    protected $fillable = ['name'];

    protected function exercise()
    {
        return $this->hasMany(Exercise::class);
    }

}
