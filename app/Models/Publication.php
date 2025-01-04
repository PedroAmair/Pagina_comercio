<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'quantity',
        'condition',
        'user_id',
        'product_id',
        'product',
        'brand',
        'category',
        'price',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('username', 'image');
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_publications')->withPivot('id', 'quantity', 'order_code', 'status', 'created_at');
    }

}
