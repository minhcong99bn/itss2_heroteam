<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Card;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Tab;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        return view('collection.home', compact('collections'));
    }

    public function show(Request $request)
    {
        $collection = Collection::where('id', $request->id)->first();
        $totalCard = Card::where('collection_id', $request->id)->count();
        $newCard = Card::where('collection_id', $request->id)->where('level', -1)->count();
        $dueCard = Card::where('collection_id', $request->id)->where('default','<=', Carbon::now())->count();
        $schedule = Schedule::where('collection_id', $request->id)->first();

        return view('collection.collection-detail', compact('collection', 'totalCard', 'newCard', 'dueCard', 'schedule'));
    }

    public function showOtherCollection(Request $request)
    {
        $collection = Collection::where('id', $request->id)->first();
        $totalCard = Card::where('collection_id', $request->id)->count();
        $newCard = Card::where('collection_id', $request->id)->where('level', -1)->count();
        $dueCard = Card::where('collection_id', $request->id)->where('default','<=', Carbon::now())->count();
        $schedule = Schedule::where('collection_id', $request->id)->first();

        return view('collection.view-collection', compact('collection', 'totalCard', 'newCard', 'dueCard', 'schedule'));
    }

    public function getShare(Request $request)
    {
        // 1: public
        $collections = Collection::where('user_id', '!=', auth()->id())->where('status', 1)->get();
        $tags = Tab::get();
        
        return view('collection.other-collection', compact('collections', 'tags'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(),
            'level' => -1
        ];

        $collection = Collection::create($data);
        $collections = Collection::orderBy('created_at', 'desc')->get();
        $dataSchedule = [
            'one' => 10,
            'two' => 1,
            'three' => 1,
            'four' => 1,
            'custom' => 6,
            'default' => Carbon::now()->addMinutes(10),
            'collection_id' => $collections[0]->id
        ];
        $schedule = Schedule::create($dataSchedule);
        
        return response()->json($collection);
    }

    public function update(Request $request)
    {
        $collection = Collection::find($request->id)->update([
            'name'=> $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json($request->id);
    }

    public function showCardByCollection($id)
    {
        $cards = Card::where('collection_id', $id)->orderBy('updated_at', 'desc')->get();
        $tags = Tab::get();
        
        return view('card.edit-card', compact('cards', 'id', 'tags'));
    }

    public function delete(Request $request)
    {
        Collection::destroy($request->id);

        return response()->json();
    }

    public function viewCollection($id)
    {
        $tags = Tab::get();
        $cards = Card::where('collection_id', $id)->get();

        return view('collection.view-other-collection', compact('cards', 'tags', 'id'));
    } 
}
