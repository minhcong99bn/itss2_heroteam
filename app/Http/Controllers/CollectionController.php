<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Card;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::where('user_id', auth()->id())->paginate(10);
        return view('collection.index', compact('collections'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'user_id' => auth()->id()
        ];
        $collection = Collection::create($data);
        
        return response()->json($collection);
    }

    public function createCard($id)
    {
        $collection = Collection::findOrFail($id);
        $cards = Card::where('collection_id', $id)->orderBy('updated_at','Desc')->paginate(6);

        return view('collection.create-card', compact('collection', 'cards'));
    }

    public function update($id, Request $request)
    {
        $collection = Collection::find($id)->update(['name'=> $request->name]);

        return response()->json($id);
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
        $collection = Collection::select('name', 'id')->get();
        return view('collection.index-card', compact('collection'));
    }

}
