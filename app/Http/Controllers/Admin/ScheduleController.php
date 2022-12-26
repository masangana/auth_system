<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place_schedule;

class ScheduleController extends Controller
{
    public function place(Request $request )
    {
        //return $request->days[1];

        foreach($request->days as $day){
            
            $schedule = new Place_schedule;
            $schedule->place_id = $request->place;
            $schedule->day = $day;
            $schedule->open = $request->{$day."Start"};
            $schedule->close = $request->{$day."End"};
            $schedule->save();
        }
    }
}
