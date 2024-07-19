<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'origin',
        'reference',
        'date',
        'voucher',
        'total',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('fname', 'lname');
    }

    public function publications()
    {
        return $this->belongsToMany(Publication::class, 'payment_publications')->withPivot('quantity', 'order_code', 'status', 'created_at');
    }
}
