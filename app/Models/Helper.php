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
        return $this->belongsTo(Product::class, 'id' , 'helper_id');
    }

    public function type() {
        return $this->belongsTo(type::class, 'type_id' , 'id');
    }
}
