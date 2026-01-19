<?php

namespace App\Models;

use http\Message\Body;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Exercise extends Model
{
    protected $fillable = ['order_by','title','cloudflare_video','youtube_video','going_up','going_down',
        'thumbnail', 'time_tense','level_id','part_id','muscle_id','body_id'];


    public function muscle()
    {
        return $this->belongsTo(Muscle::class,'muscle_id');
    }

    public function bodyPart()
    {
        return $this->belongsTo(BodyPart::class,'part_id');
    }
    public function bodyLevel()
    {
        return $this->belongsTo(BodyLevel::class,'body_id');
    }
    public function levelExercise()
    {
        return $this->belongsTo(level::class,'level_id');
    }
    public function exercisePosition()
    {
        return $this->hasMany(ExercisePosition::class);
    }

}


