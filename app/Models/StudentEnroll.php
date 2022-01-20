<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnroll extends Model
{
    use HasFactory;
    protected $fillable =  ['pricing_id', 'user_id', 'type', 'learn_date', 'start_date', 'expire_date', 'payment_image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
