<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_recipe');
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class,'recipe_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'comment_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class,'rating_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

}
