<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'direction_line_1',
        'direction_line_2',
        'country',
        'state',
        'city',
        'zip_code',
        'user_id',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('fname', 'lname');
    }
}
