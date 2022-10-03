<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $guarded = [];



    // relation type
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    // relation level
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }


    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
