<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;

    public function products()
    {
       return $this->hasMany(Product::class);
    }


    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->children()->delete();
        });
    }
}
