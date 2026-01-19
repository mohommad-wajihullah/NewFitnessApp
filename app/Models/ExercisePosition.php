<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExercisePosition extends Model
{
    protected $fillable = ['exercise_id', 'description'];

   public function exercise()
   {
       return $this->belongsTo(Exercise::class, 'exercise_id');

   }

}
