<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reputation extends Model
{
    use HasFactory;

    protected $fillable = [
        'calification',
        'comments',
        'rated',
        'payment_id',
        'user_id',
        'seller_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }
    
}
