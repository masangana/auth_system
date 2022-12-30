<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function places()
    {
        return $this->belongsToMany(Place::class, 'category_places');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'category_events');
    }
}
