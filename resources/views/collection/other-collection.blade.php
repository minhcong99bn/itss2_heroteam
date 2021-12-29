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
<style>
	.navbar{
	display: flex;
	align-items: center;
	width: 100%;
	height: 100px;
	margin-bottom: 10px;
	background-color: rgb(124, 56, 7);
	z-index: 100;
}

.navbar .logo{
	width: 100px;
	height: 50px;
	margin-left: 100px;
	margin-right: 500px;
}

.navbar .user{
	width: 50px;
	height: 50px;
	border-radius: 100%;
	margin-right: 100px;
	margin-left: 200px;
}

.navbar .btn{
	width: 140px;
	height: 40px;
	margin-left: 50px;
	border: none;
	border-radius: 40px;
	background-color: rgb(124, 56, 7);
	color: white;
	font-size: 1em;
}

.navbar .btn:hover{
	background-color: rgb(235, 162, 149);
}


.main{
	width: 100%;
	display: flex;
}

.left-main{
	width: 65%;
	display: flex;
}

.left-main .sidebar{
	width: 50%;
	padding-left: 100px;
}

.sidebar .search{
	width: 280px;
	margin-top: 50px;
	margin-bottom: 10px;
	height: 30px;
	font-size: 1em;
}
.sidebar h1{
	font-size: 2em;
	margin-bottom: 10px;
}

.tag{
	width: 60%;
	height: 450px;
	background-color: rgb(172, 171, 171);
	padding: 20px 10px;
	overflow-y: scroll;
	scrollbar-width: thin 5px;
}

.tag div{
	height: 70px;
}

.tag div input{
	width: 20px;
	height: 20px;
}

.tag div label{
	margin-left: 40px;
	font-size: 1em;
	font-weight: bold;
	color: whitesmoke;
	text-align: center;
}

.course{
	margin-top: 50px;
	width: 50%;
	height: 550px;
	overflow-y: scroll;
}

.course p{
	display: flex;
	position: relative;
	margin-top: 10px;
	width: 80%;
	height: 100px;
	background-color: rgb(219, 83, 105);
	color: white;
	font-size: 1.3em;
	align-items: center;
	padding-left: 20px;
	border-radius: 20px;
}

.course p button{
	position: absolute;
	right: 10px;
	width: 100px;
	background-color: aqua;
}

.right-main{
	width: 35%;
	padding-top: 50px;
}

.right-main div{
	display: flex;
	justify-content: space-around;
	margin-bottom: 50px;
	margin-top: 10px;
}

.right-main div h1{
	font-size: 1.3em;
}

.right-main p{
	margin-left: 50px;
	width: 270px;
	display: block;
}
.right-main p1{
	display: flex;
	margin-left: 50px;
	width: 270px;
	background-color: brown;
	color: white;
}
.right-main des{
	height: 50px;
	background-color: brown;
}

.right-main content{
	background-color: white;
}
</style>