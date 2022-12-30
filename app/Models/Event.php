<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'finished',
    ];

    public function schedules()
    {
        return $this->hasMany(event_schedule::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function adress()
    {
        return $this->morphMany(Adress::class, 'adressable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_events');
    }
}
