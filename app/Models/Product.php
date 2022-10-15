<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $guarded = [];

    protected $appends = ['photo_products'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product/helpers' . $this->image);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('country')->fit('fill', 590, 206);
        $this->addMediaConversion('mobile')->fit('fill', 450, 321);
        $this->addMediaConversion('desktop')->fit('fill', 1351, 206);
    }

    // relation type
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function helper()
    {
        return $this->belongsTo(Helper::class, 'helper_id', 'id');
    }
}
