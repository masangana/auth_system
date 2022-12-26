<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place_schedule extends Model
{
    use HasFactory;

    protected $dates = ['open', 'close'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
