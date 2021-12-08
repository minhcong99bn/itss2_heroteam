<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $collections = Collection::where('user_id', auth()->id())->get();

        return view('collection.schedule', compact('collections'));
    }

    public function setSchedule(Request $request)
    {
        $collection = Collection::where('id', $request->collection_id)->where('user_id', auth()->id())->first();
        $schedule = Schedule::where('collection_id', $collection->id)->first();
        $dataSchedule = ['default' => Carbon::now()->addMonths($schedule->custom) ];
        if ($collection->level != 0)
        {
            if ($request->easy == 1)
            {
                if ($collection->level == 4) {
                    $collection->level = 0;
                }
                else {
                    $data = ['level' => $collection->level + 1];
                    $collection->update($data);
                    if ($collection->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } else if ($collection->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    else
                        $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);
                }
            } elseif ($request->hard == 1) {
                if ($collection->level == 2) {
                    $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                } else if ($collection->level == 3) 
                    $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                elseif($collection->level == 4)
                    $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);
                else $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
            } elseif ($request->veryhard == 1) {
                if ($collection->level == 1) {
                    $collection->level = 1;
                }
                else {
                    $data = ['level' => $collection->level - 1];
                    $collection->update($data);
                    if ($collection->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } else if ($collection->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    else if ($collection->level == 1)
                        $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
                }
            }
        }
        $schedule->update($dataSchedule);
        $level = $collection->level;

        return response()->json($level);
    }

    public function show(Request $request)
    {
        $schedule = Schedule::where('collection_id', $request->id)->first();

        return view('collection.schedule-show', compact('schedule'));
    }

    public function update(Request $request)
    {
        $schedule = Schedule::where('collection_id', $request->id)->first();
        $data = [
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'custom' => $request->custom,
        ];
        $schedule->update($data);

        return response()->json();
    }
}
