<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name'];

    public function planProvinces()
    {
        return $this->hasMany(PlanProvince::class, 'province_id');
    }

    public function requestServices()
    {
        return $this->hasMany(RequestService::class, 'province_id');
    }

    public function service()
    {
        return $this->hasMany(Service::class, 'province_id');
    }
}
