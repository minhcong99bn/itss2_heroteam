
    <div class="col-8 bg-secondary card-show" style="height: 600px">
        <input class="input-data" value="1" hidden> 
        @foreach($cards as $card )
            <div class="card" onclick="flip()">
                <div class="front">{{ $card->front }}</div>
                <div class="back">{{ $card->back }}</div>
            </div>
        @endforeach
    </div>
