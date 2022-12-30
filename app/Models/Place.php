<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function adress()
    {
        return $this->morphMany(Adress::class, 'adressable');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_places');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function schedules()
    {
        return $this->hasMany(Place_schedule::class);
    }
}
