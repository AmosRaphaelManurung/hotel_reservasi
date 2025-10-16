<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_name',
        'check_in',
        'check_out',
        'room_type',
        'guest_count',
        'room_id'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
