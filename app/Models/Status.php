<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'user_id', 'content', 'created_at', 'updated_at'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
