<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function services()
    {
        return view('user.filter.service');
    }

    public function events()
    {
        return view('user.filter.event');
    }
}
