<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'slug', 'like_count', 'type', 'title', 'image', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsToMany(Language::class, 'course_language');
    }

    public function comment()
    {
        return $this->hasMany(CourseComment::class);
    }

    public function video()
    {
        return $this->hasMany(CourseVideo::class);
    }
}
