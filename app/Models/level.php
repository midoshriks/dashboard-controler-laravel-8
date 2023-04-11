<?php

namespace App\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class level extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['photo_level', 'questions']; // get photo_level Attribute // 'type_name'

    // public function getTypeNameAttribute()
    // {
    //     return $this->type->name;
    // }

    public function getPhotoLevelAttribute()
    {
        return asset(($this->getMedia('photo_level')->last() ? $this->getMedia('photo_level')->last()->getUrl() : 'uploads/levels/' . $this->image));

        // return asset(($this->getMedia('photo_level')->last() ? $this->getMedia('photo_level')->last()->getUrl('mobile') : 'uploads/levels/' . $this->image));
        // return asset(($this->getMedia('photo_user')->last() ? $this->getMedia('photo_user')->last()->getUrl() : 'uploads/users/' . $this->image));

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('country')->fit('fill', 590, 206);
        $this->addMediaConversion('mobile')->fit('fill', 450, 321);
        $this->addMediaConversion('desktop')->fit('fill', 1351, 206);
    }

    public function getQuestionsAttribute()
    {
        return $this->questions()->count();
    }

    public function questions()
    {
        $type_status =  get_type('question_status','basic');
        return $this->hasMany(Question::class, 'level_id', 'id')->where('type_status', $type_status->id);
    }

    public function additions()
    {
        $type_status =  get_type('question_status','additional');
        return $this->hasMany(Question::class, 'level_id', 'id')->where('type_status', $type_status->id);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
        // return $this->belongsTo(Answer::class, 'question_id', 'id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_levels');
    }
}
