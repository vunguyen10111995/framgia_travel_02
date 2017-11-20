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

    public function isLocalImage($image)
    {
        $length = strlen(strstr($image, 'https://'));
        if($length > 0 ) {
            return true;
        }
        
        return false;
    }

    public function getImageAttribute()
    {
        $imageName = $this->attributes['image'];
        if ($this->isLocalImage($imageName)) {
            return $imageName;
        }

        return asset(config('setting.defaultPath') . $imageName);
    }
    
    public function scopeSearch($query, $key)
    {
        return $query->where('name', 'like', '%'. $key .'%');
    }
}
