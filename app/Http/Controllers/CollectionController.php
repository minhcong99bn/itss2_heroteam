<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Card;
use App\Models\Schedule;
use Carbon\Carbon;

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
        $newCard = Card::where('collection_id', $request->id)->where('level', 0)->count();
        $dueCard = Card::where('collection_id', $request->id)->where('default', Carbon::today())->count();
        $schedule = Schedule::where('collection_id', $request->id)->first();

        return view('collection.collection-detail', compact('collection', 'totalCard', 'newCard', 'dueCard', 'schedule'));
    }

    public function showOtherCollection(Request $request)
    {
        $collection = Collection::where('id', $request->id)->first();
        $totalCard = Card::where('collection_id', $request->id)->count();
        $newCard = Card::where('collection_id', $request->id)->where('level', 0)->count();
        $dueCard = Card::where('collection_id', $request->id)->where('default', Carbon::today())->count();
        $schedule = Schedule::where('collection_id', $request->id)->first();

        return view('collection.view-collection', compact('collection', 'totalCard', 'newCard', 'dueCard', 'schedule'));
    }

    public function getShare(Request $request)
    {
        $collections = Collection::where('user_id', '!=', auth()->id())->get();
        
        return view('collection.other-collection', compact('collections'));
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
        $cards = Card::where('collection_id', $id)->get();
        
        return view('card.edit-card', compact('cards', 'id'));
    }
    
    public function createCard($id)
    {
        $collection = Collection::findOrFail($id);
        $cards = Card::where('collection_id', $id)->orderBy('updated_at','Desc')->paginate(6);

        return view('collection.create-card', compact('collection', 'cards'));
    }

    public function storeCard(Request $request)
    {
        $data = [
            'front' => $request->front,
            'back' => $request->back,
            'collection_id' => $request->collection_id,
        ];

        $card = Card::create($data);
        
        return response()->json();
    }

    public function showCard(Request $request)
    {
        $card = Card::findOrFail($request->id);

        return view('collection.show-card', compact('card'));
    }

    public function updateCard(Request $request)
    {
        $card = Card::find($request->id)
            ->update(
                [
                    'front'=> $request->front,
                    'back' => $request->back
                ]
            );
        $card = Card::findOrFail($request->id);

        return view('collection.show-card', compact('card'));
    }

    public function deleteCard(Request $request)
    {
        Card::destroy($request->id);

        return view('collection.delete-card');
    }

    public function delete(Request $request)
    {
        Collection::destroy($request->id);

        return response()->json();
    }

    public function showCollection(){
        $collection = Collection::select('name', 'id', 'level')->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        $now = Carbon::now();

        return view('collection.index-card', compact('collection', 'now'));
    }
}
