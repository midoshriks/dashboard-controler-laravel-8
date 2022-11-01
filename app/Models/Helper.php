<?php

namespace App\Models;

use App\Models\type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Helper extends Model
{
    use HasFactory;

    public $guarded = [];


    public function products(){
        return $this->hasMany(Product::class, 'helper_id' , 'id');
    }

    public function type() {
        return $this->belongsTo(type::class, 'type_id' , 'id');
    }
}
