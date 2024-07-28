<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes(){
        return $this->belongsTo(Recipe::class,'recipe_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
