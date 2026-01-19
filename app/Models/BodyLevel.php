<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyLevel extends Model
{
    protected $fillable = ['name','type_id','with_equipment'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    protected function exercise()
    {
        return $this->hasMany(Exercise::class);

    }



}
