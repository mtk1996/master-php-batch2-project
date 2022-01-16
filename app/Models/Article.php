<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable  = ['slug', 'category_id', 'like_count', 'title', 'image', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsToMany(Language::class, 'article_language');
    }

    public function comment()
    {
        return $this->hasMany(ArticleComment::class);
    }
}
