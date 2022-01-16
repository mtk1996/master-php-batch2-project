<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrollHistory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'pricing_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
