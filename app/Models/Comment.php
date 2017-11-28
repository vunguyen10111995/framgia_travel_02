<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'content'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeGetComment($query, $value)
    {
        return $query->orderBy('created_at', 'desc')->Where('plan_id', $value)->with('user')->get();
    }
}
