<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForkSchedule extends Model
{
    protected $table = "fork_schedule";
    protected $fillable = [
        'fork_id',
        'service_id',
        'start_at',
        'end_at',
        'date',
        'title',
        'price',
        'description',
    ];

    public function fork()
    {
        return $this->belongsTo(Fork::class, 'fork_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
