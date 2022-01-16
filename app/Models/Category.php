<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name'];
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
