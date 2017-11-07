<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanProvince extends Model
{   
    protected $table = "plan_province";
    
    protected $fillable = [
        'plan_id',
        'province_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
