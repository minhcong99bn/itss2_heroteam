<div class="right-main">
    <div>
        <h1 style="color: back; font-size: 38px; font-weight: 600;">Viewing Collection</h1>
        @if ($check == 0)
            <a  href="{{ route('clone.collection', $collection->id) }}" >
                <img class="mt--5" style="margin-top: -40px; width: 150px;" src="{{ asset('storage/images/clonebutton.png') }}" alt="logo" />
            </a>
        @endif
    </div>
    <p1 class="des p-2" style="font-weight: 700; font-size: 20px;">Description</p1>
    <p class="content mt-3" style="font-weight: 500; color: black;">{{ $collection->description }}</p>
    <div class="mt-3">
        <p1 class="p-2 mt-3" style="font-weight: 700; font-size: 20px;">Total</p1>
        <p class="mt-3" style="font-weight: 800; color: black;">{{ $totalCard}}</p>
        <p class="mt-3" style="font-weight: 800; color: black;">cards</p>
    </div>
    <div>
        <p1 class="p-2 mt-3" style="font-weight: 700; font-size: 20px;">Clone</p1>
        <p class="mt-3" style="font-weight: 800; color: black;">{{ $totalClone }}</p>
        <p class="mt-3" style="font-weight: 800; color: black;">times</p>
    </div>
    <div>
        <a href="{{ route('collection-view', $collection->id ) }}" class="btn  px-5 py-3" style="color: white; font-size: 20px; background-color: #438CFB; font-weight: 500; border-radius: 15px;">More Detail</a>
    </div>
</div>