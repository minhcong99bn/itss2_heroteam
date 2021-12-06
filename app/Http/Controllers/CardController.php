<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $cards = Card::where('collection_id', $request->id)->paginate(1);
        $count = count($cards);

        return view('card.detail', compact('cards', 'count'));
    }

    public function store(Request $request)
    {

    }

    public function createCard($id)
    {
    }

    public function update($id, Request $request)
    {
    }
}
