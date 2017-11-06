<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'province_id',
        'name',
        'price',
        'rate',
        'description',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'service_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function forkSchedule()
    {
        return $this->belongsTo(ForkSchedule::class, 'service_id');
    }
}
