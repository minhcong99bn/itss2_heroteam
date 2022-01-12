@extends('layouts.app')

@section('content')
       {{-- Create card --}}
<section class="d-flex justify-content-center mt-5">
    <form action="{{ route('card.store', $collection->id) }}" method="post">
        @csrf
        <div class="shadow-lg bg-body rounded d-flex justify-content-center">
            <div class="form-group">
                <nav class="navbar" style="background-color: #1E90FF; ">
                    <div class="container-fluid">
                        <a class="navbar-brand" style="font-size: 35px; font-weight: 600;color:white;">{{ __('New Card') }}</a>
                    </div>
                </nav>
                <div id="new-device" class="mx-3 mt-3">
                    <div class="form-group row col-md-12 form-report-today-content">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Card Front') }}</label>
                                <input class="form-control  @error('title') is-invalid @enderror"
                                    type="text" name="front" required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Card Back') }}</label>
                                <textarea style="width: 100px;" class="form-control  @error('content') is-invalid @enderror"
                                    type="text" name="back" rows="5" id="editor"></textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Select Tag') }}</label>
                                <select class="fav_clr form-control" name="tag[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center col-12">
                    <button type="submit" class="px-4 py-3 btn btn-primary action_post mr-3 border text-white">{{ __('Submit') }}</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
<style>
    .select2 {
    margin-left: -10px !important;
    margin-top: 15px !important;
    padding: 15px !important;
}

.select2-search__field {
    font-size: 18px !important;
}

.tags .select2-selection {
    width: 50% !important;
}

.tags .select2-selection--multiple
{
    height: 40px !important;
}

.ck-content   p {
    height: 80px;
}
</style>
<script src="http://code.jquery.com/jquery.min.js"></script>
@push('js')
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

<script>
    $(document).ready(function() {
$('.fav_clr').select2({
    placeholder: 'Tags',
    width: '100%',
    border: '1px solid #e4e5e7',
});
});
$('.fav_clr').on("select2:select", function (e) { 
       var data = e.params.data.text;
       if(data=='all'){
        $(".fav_clr > option").prop("selected","selected");
        $(".fav_clr").trigger("change");
       }
  });
</script>
@endpush
