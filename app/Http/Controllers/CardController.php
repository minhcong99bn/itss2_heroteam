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
        ->with('collection', function ($collection){
            $collection->with('schedules')->get();
        })
        ->paginate(1);

        return view('card.index', compact('cards'));
    }

    public function learnNow($id)
    {
        $cards = Card::where('default', '<=', Carbon::now())->where('collection_id', $id)
        ->with('collection', function ($collection){
            $collection->with('schedules')->get();
        })
        ->paginate(1);

        return view('card.index', compact('cards'));
    }


    public function createCard($id)
    {
        $tags = Tab::get();
        $collection = Collection::where('id', $id)->first();
        
        return view('card.add-cardd', compact('tags', 'collection'));
    }

    public function store($id, Request $request)
    {
        $data = [
            'front' => $request->front,
            'back' => $request->back,
            'collection_id' => $id,
            'level' => -1,
            'default' => Carbon::now()
        ];

        $card = Card::create($data);
        $card->tabs()->attach($request->tag);

        return redirect()->route('collection.card', $id)->with(['success' => 'Create card success!']);
    }

    public function storeTag(Request $request)
    {
        $data = [
            'name' => $request->name
        ];
        
        $tag = Tab::create($data);

        return redirect()->route('collection.card', $request->id)->width(['success'=> 'Create Tag success!']);
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
        $check = Collection::where('collection_id', $card->collection_id)->where('user_id', auth()->id())->count();

        return view('collection.view-other-card', compact('card', 'tags', 'check'));
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

    public function cardSchedule(Request $request)
    {
        $card = Card::where('id',$request->id)->first();
        $schedule = Schedule::where('collection_id', $card->collection_id)->first();
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
                    $card->update($data);
                    if ($card->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } elseif ($card->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    elseif($card->level == 4)
                        $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);

                    else $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
                }
            } 
            elseif ($request->hard == 1) {
                if ( $card->level == -1) 
                {
                    $data = ['level' => 1];
                    $card->update($data);
                }
                if ($card->level == 2) {
                    $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                } elseif ($card->level == 3) 
                    $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                elseif($card->level == 4)
                    $dataSchedule['default'] = Carbon::now()->addMonths($schedule->four);
                elseif ($card->level == 1) 
                    $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
            } 
            elseif ($request->veryhard == 1) {
                if ( $card->level == -1) 
                {
                    $data = ['level' => 1];
                    $card->update($data);
                }
                if ($card->level == 1) {
                    $card->level = 1;
                }
                else {
                    $data = ['level' => $card->level - 1];
                    $card->update($data);
                    if ($card->level == 2) {
                        $dataSchedule['default'] = Carbon::now()->addDays($schedule->two);
                    } else if ($card->level == 3) 
                        $dataSchedule['default'] = Carbon::now()->addWeeks($schedule->three);
                    else if ($card->level == 1)
                        $dataSchedule['default'] = Carbon::now()->addMinutes($schedule->one);
                }
            }
        }
        $card->update($dataSchedule);

        return $card;
    }
}
