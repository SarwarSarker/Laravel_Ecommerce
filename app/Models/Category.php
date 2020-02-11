<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'name',
        'image',
        'description',
        'parent_id'
    ];
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    
}