<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'town',
        'district',
        'avenue',
        'number',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
