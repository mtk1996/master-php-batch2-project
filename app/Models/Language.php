<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name'];

    public function article()
    {
        return $this->belongsToMany(Article::class, 'article_language');
    }
    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_language');
    }
}
