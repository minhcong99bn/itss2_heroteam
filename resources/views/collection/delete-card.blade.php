<div class="col-8 bg-light card-collection">
    <div class="container my-5">
        <div class="row mx-4">
            <div class="col d-flex flex-column justify-content-center">
                <div class="card-front bg-secondary border mb-4">
                    <div class="text-center text-white my-4">
                        <p>Front</p>
                        <meta name="csrf-token" content="{!! csrf_token() !!}">
                        <textarea id="text-front" name="text-front" rows="12" cols="50" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-back bg-secondary border mb-4">
                    <div class="text-center text-white my-4">
                        <p>Back</p>
                        <meta name="csrf-token" content="{!! csrf_token() !!}">
                        <textarea id="text-back" name="text-back" rows="12" cols="50" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button path="{{ route('card.store') }}" class="btn btn-primary btn-save">Save</button>
        </div>
    </div>
</div>
