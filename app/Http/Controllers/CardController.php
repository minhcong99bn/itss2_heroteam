<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Carbon\Carbon;
use App\Models\Collection;
use App\Models\Schedule;
use App\Models\Tab;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $cards = Card::where('default', '<=', Carbon::now())
        ->whereHas('collection', function ($collection) {
            $collection->where('user_id', auth()->id());
            })
        ->paginate(1);

        return view('card.index', compact('cards'));
    }

    public function store(Request $request)
    {
        $data = [
            'front' => $request->front,
            'back' => $request->back,
            'collection_id' => $request->id,
            'level' => -1,
            'default' => Carbon::now()
        ];

        $card = Card::create($data);
        $card->tabs()->attach($request->tag);

        return redirect()->route('collection.card', $request->id);
    }

    public function storeTag(Request $request)
    {
        $data = [
            'name' => $request->name
        ];
        $tag = Tab::create($data);

        return redirect()->route('collection.card', $request->id);
    }

    public function show($id)
    {
        
        $card = Card::findOrFail($id);
        $tags = Tab::get();

        return view('card.card-show', compact('card', 'tags'));
    }

    public function showOther($id)
    {
        
        $card = Card::findOrFail($id);
        $tags = Tab::get();

        return view('collection.view-other-card', compact('card', 'tags'));
    }

    public function update($id, Request $request)
    {
        $card = Card::findOrFail($id);
        $data = [
            'front' => $request->front,
            'back' => $request->back,
        ];
        $card->update($data);
        $card->tabs()->sync($request->tag);
        return $card;
    }

    public function destroy($id, Request $request)
    {
        Card::findOrFail($id)->tabs()->detach($request->tag);
        Card::destroy($id);

        return response()->json();
    }

    public function updateCardSchedule(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $collection = Collection::where('id', $card->collection_id)->first();
        $schedule = Schedule::where('collection_id', $collection->id)->first();
        $dataSchedule = ['default' => Carbon::now()->addMonths($schedule->custom) ];
        if ($card->level != 0)
        {
            if ($request->easy == 1)
            {
                if ($card->level == 4) {
                    $card->level = 0;
                }
                else {
                    
                    if ($card->level == -1)  
                        $data = ['level' => '1'] ;
                    elseif ($card->level == 1)
                        $data = ['level' => '2'] ;
                    elseif ($card->level == 2)
                        $data = ['level' => '3'] ;
                    else 
                        $data = ['level' => '4'];
                    $card->update(['level' => 2]);
                    if ($card->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } else if ($collection->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    else
                        $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);
                }
            } 
            elseif ($request->hard == 1) {
                if ($card->level == 2) {
                    $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                } else if ($card->level == 3) 
                    $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                elseif($card->level == 4)
                    $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);
                else $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
            } 
            elseif ($request->veryhard == 1) {
                if ($card->level == 1) {
                    $card->level = 1;
                }
                else {
                    $data = ['level' => $card->level - 1];
                    if ( $card->level == -1)  $data = ['level' => 1];
                    $card->update($data);
                    if ($collection->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } else if ($card->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    else if ($card->level == 1)
                        $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
                }
            }
            if ( $card->level == -1) 
            {
                $data = ['level' => 1];
                $card->update($data);
            }
            
        }
        $card->update($dataSchedule);

        return $card;
    }
}
