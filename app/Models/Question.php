<?php

namespace App\Models;

use App\Models\type;
use App\Models\level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    public $guarded = [];



    // relation type
    public function type()
    {
        return $this->belongsTo(type::class, 'type_id', 'id');
    }

    // relation level
    public function level()
    {
        return $this->belongsTo(level::class, 'level_id', 'id');
    }


    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
        // return $this->belongsTo(Answer::class, 'question_id', 'id');
    }
}
