<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public $guraded = [];
    protected $fillable = [
        'answer',
        'question_id',
        'correct',
    ];

    public function dataexcel()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    // public function answers_update()
    // {
    //     return $this->belongsToMany(Answer::class,);
    // }
}
