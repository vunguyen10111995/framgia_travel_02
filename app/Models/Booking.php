<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'full_name',
        'email',
        'country',
        'phone',
        'start_at',
        'end_at',
        'adult',
        'child',
        'total_amount',
        'status'
    ];

    public function customer()
    {
        return $this->hasmany(Customer::class);
    }
}
