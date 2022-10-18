<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;

    public $guarded = [];

    public function coin(){
        return $this->belongsTo(Product::class, 'id' , 'helper_id');
    }
}
