<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Concat;

class Place extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->morphMany(Schedule::class, 'schedulable');
    }

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
        return $this->morphMany(Concat::class, 'contactable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
