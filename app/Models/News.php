<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'news_tags','news_id','tag_id')->withTimestamps();
    }

    public function categoriesNews()
    {
        return $this->belongsTo(NewsCategory::class,'category_id');
    }
}
