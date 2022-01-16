<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'learn_date', 'price', 'description'];

    public function studentEnroll()
    {
        return $this->hasMany(StudentEnroll::class);
    }
    public function studentEnrollHistory()
    {
        return $this->hasMany(StudentEnrollHistory::class);
    }
}
