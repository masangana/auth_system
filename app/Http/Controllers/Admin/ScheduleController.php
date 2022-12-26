<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event_schedule;
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

        return redirect()->route('place.show', ['place' => $request->place])->with('success', 'Service created successfully.');
    }

    public function event(Request $request )
    {
        //return $request->days[1];

        $request->validate(
            [
                'dateStart' => 'required|before_or_equal:dateEnd',
                'dateEnd' => 'required|after_or_equal:dateStart',
                'timeStart' => 'required',
                'timeEnd' => 'required',
            ]
        );

        $chedule = new Event_schedule;
        $chedule->event_id = $request->event;
        $chedule->date_start = $request->dateStart;
        $chedule->date_end = $request->dateEnd;
        $chedule->time_start = $request->timeStart;
        $chedule->time_end = $request->timeEnd;
        $chedule->title = $request->title;
        $chedule->description = $request->description;
        $chedule->save();

        return redirect()->route('event.show', ['event' => $request->event])->with('success', 'Service created successfully.');
    
    }
}
