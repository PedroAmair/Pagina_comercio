<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPublications extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'order_code',
        'status',
        'publication_id',
        'payment_id'
    ];
}
