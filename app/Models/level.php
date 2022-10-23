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

    protected $appends = ['photo_level']; // get photo_level Attribute // 'type_name'

    // public function getTypeNameAttribute()
    // {
    //     return $this->type->name;
    // }

    public function getPhotoLevelAttribute()
    {
        return asset('uploads/levels/' . $this->image);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('country')->fit('fill', 590, 206);
        $this->addMediaConversion('mobile')->fit('fill', 450, 321);
        $this->addMediaConversion('desktop')->fit('fill', 1351, 206);
    }

    public function questions() {
        return $this->hasMany(Question::class, 'level_id','id');
    }


    public function users() {
        return $this->belongsToMany(User::class,'user_levels');
    }


}
