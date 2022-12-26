<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_schedule extends Model
{
    use HasFactory;

    protected $dates = ['date_start', 'date_end', 'time_start', 'time_end'];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
