<div class="col-8 bg-light card-collection">
    <div class="container my-5">
        <div class="row mx-4">
            <div class="col d-flex flex-column justify-content-center">
                <div class="card-front bg-secondary border mb-4">
                    <div class="text-center text-white my-4">
                        <p>フロント</p>
                        <meta name="csrf-token" content="{!! csrf_token() !!}">
                        <textarea name="text-front" class="front" rows="12" cols="50" required>{{ $card->front }}</textarea>
                    </div>
                </div>
                <div>
                    <button path="{{ route('card.store') }}" class="btn btn-primary btn-save">保存する</button>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-back bg-secondary border mb-4">
                    <div class="text-center text-white my-4">
                        <p>裏側</p>
                        <meta name="csrf-token" content="{!! csrf_token() !!}">
                        <textarea  name="text-back" class="back" rows="12" cols="50" required>{{ $card->back }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class>
            <a href="javascript:void(0)" class="btn btn-primary update-card" path="{{ route('collection.update-card') }}" data-id="{{ $card->id }}">アップデート</a>
            <a href="javascript:void(0)" class="btn btn-secondary delete-card" path="{{ route('collection.delete-card') }}" data-id="{{ $card->id }}" onclick="return confirm('これを削除しますか?')">消去</a>
        </div>
    </div>
</div>
