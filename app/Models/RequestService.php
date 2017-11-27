<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    protected $fillable = [
        'category_id',
        'province_id',
        'user_id',
        'name',
        'address',
        'open_time',
        'price',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('name', 'like', '%'. $key .'%');
    }
}
