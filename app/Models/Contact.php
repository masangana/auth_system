<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'mail',
        'web_site',
        'contactable_id',
        'contactable_type',
    ];

    public function contactable()
    {
        return $this->morphTo();
    }
}
