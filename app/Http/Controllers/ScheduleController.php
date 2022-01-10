<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function update(Request $request)
    {
        $schedule = Schedule::where('collection_id', $request->id)->first();
        $collection = Collection::where('id', $request->id)->first();
        $schedule = Schedule::where('collection_id', $collection->id)->first();
        $data = [
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'custom' => $request->custom,
        ];
        $schedule->update($data);

        if ($collection->level == 1 )
            $dataSchedule['default'] = Carbon::now()->addMinutes($request->one);
        else if ($collection->level == 2 )
            $dataSchedule['default'] = Carbon::now()->addDays($request->two);
        else if ($collection->level == 3)
            $dataSchedule['default'] = Carbon::now()->addWeeks($request->three);
        else if ($collection->level == 4)
            $dataSchedule['default'] = Carbon::now()->addMonths($request->four);
        else $dataSchedule['default'] = Carbon::now()->addMonths($request->custom);
        $schedule->update($dataSchedule);

        return response()->json();
    }
}
