@extends('layouts.app')
@section('content')

	<div class="root">	
		<div class="main">
			<div class="left-main">
				<div class="sidebar">
					<input type="search" name="" class="search form-control " placeholder="search...">
					<h1>TAG</h1>
					<div class="tag">
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>MATH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>LITERATURE</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ANIMALS</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
						<div>
						    <input type="checkbox" name="">
						    <label>ENGLISH</label>
						</div>
					</div>
				</div>
				<div class="course">
					@foreach($collections as $collection)
						<p>{{ $collection->name }}<button class="view" data-path="{{ route('collection.showother') }}" data-id="{{ $collection->id }}" >View All >></button></p>
					@endforeach
				</div>
			</div>
			<div class="right-main">
			</div>
		</div>	
	</div>
@endsection
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
    $(document).on('click', '.view', function() {
        var id = $(this).attr("data-id");
        var path = $(this).attr("data-path"); 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: path,
            type: "get",
            data: {
                'id' : id,
            },

            success: function(response) {
                $('.right-main').children().remove();
                $('.right-main').append($(response).html());
            }
        });
    });
    
</script>