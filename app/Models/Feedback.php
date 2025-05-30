<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'feedback',
        'user_id',
        'ip_address',
        'user_agent',
        'previous_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
