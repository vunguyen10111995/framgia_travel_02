<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function requestServices()
    {
        return $this->hasMany(RequestService::class, 'category_id');
    }
}
