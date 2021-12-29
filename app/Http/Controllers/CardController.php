<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Carbon\Carbon;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $cards = Card::where('default', '<=', Carbon::now())->paginate(1);

        return view('card.index', compact('cards'));
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
