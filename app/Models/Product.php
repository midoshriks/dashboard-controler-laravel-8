<?php

namespace App\Models;

use App\Models\type;
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

    protected $appends = ['photo_product'];

    public function getPhotoProductAttribute()
    {
        return asset('uploads/products/' . $this->image);
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
        return $this->belongsTo(type::class, 'type_id', 'id');
    }

    public function helper()
    {
        return $this->belongsTo(Helper::class, 'helper_id', 'id');
    }
}
