<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            height: 200px;
        }
        .card-front, .card-back {
            height: 400px;
        }

        #text-front, #text-back, .btn-collection, .input-collection, .btn-save{
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="col-sm-6">
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-lg btn-success">Home</a>
        </div>
        <div class="col-sm-6 ">
            <div class="float-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                    this.closest('form').submit();" type="button" class="btn btn-lg btn-success">
                </form>
                    Sign Out
                </a>
            </div>
        </div>
    </nav>
    <div class="container mw-100">
        <div class="row">
            <div class="flex col-4 bg-secondary">
                <div class="container">
                    <div class="d-flex container my-3 justify-content-center flex-row align-items-center">
                        <h2 class="text-light mr-2">{{ $collection->name }}</h2>
                        <input value="{{ $collection->id}}" hidden class="hidden collection_id">
                        <meta name="csrf-token" content="{!! csrf_token() !!}">
                        <input class="input-collection" type="text" value="{{ $collection->name }}">
                        <button class="btn btn-light rounded edit-collection">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </button>
                        <button class="btn btn-primary btn-collection" path="{{ route('collection.update', $collection->id)}}">Save
                        </button>
                    </div>
                    <div class="container row ml-4">
                        @foreach($cards as $card)
                            <div class="col-5 card ml-2 mt-2" id="card-{{ $card->id }}">
                                <div class="text-center mt-3" style="height: 100px;">
                                    <b>{{ $card->front }}</b>
                                </div>
                                <div class="align-text-bottom">
                                    <a href="javascript:void(0)" id="{{ $card->id }}" path="{{ route('collection.show-card')}}" class="show-card">Show</a>
                                </div>
                            </div>                           
                        @endforeach
                    </div>
                    <div class="d-flex container my-3 justify-content-center flex-row">
                        <button class="btn btn-light btn-create-card">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </button>

                    </div>
                </div>
            </div>
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
        </div>
    </div>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>
        $('.create-collection').click(function()
        {
            var name = $('.collection-name').val();
            if (name == '')
              alert("Vui lòng điền đầy đủ thông tin");
            var path = $(this).attr("path");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                url: path,
                type: "post",
                data: {
                    'name' : name,
                },
        
                success: function(response) {
                    var path = '/collection/create/' + response.id;
                    window.location.href = path;
                    alert("Create Collection success");
                }
            });  
        });
    </script>
    <script>
        $(document).on('click', '.edit-collection', function() {
            $('.input-collection').toggle();
            $('h2').toggle();
            $('.edit-collection').toggle();
            $('.btn-collection').toggle();
        });
        
        $(document).on('click', '.btn-collection', function() {
            var path = $(this).attr("path");
            var name = $('.input-collection').val()
            if (name == '')
              alert("Vui lòng điền đầy đủ thông tin");
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                url: path,
                type: "post",
                data: {
                    'name' : name,
                },
                success: function(response) {
                    var path = '/collection/create/' + response;
                      window.location.href = path;
                }
            });  
        });
    </script>
    <script>
         $(document).on('click', '.btn-create-card', function() {
            $('#text-front').toggle();
            $('#text-back').toggle();
            $('.btn-save').toggle();
        });

        $(document).on('click', '.btn-save', function() {
            var textFront = $('#text-front').val();
            var textBack = $('#text-back').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                url: $(this).attr("path"),
                type: "post",
                data: {
                    'back' : textBack,
                    'front' : textFront,
                    'collection_id' : $('.collection_id').val(),
                },
        
                success: function(response) {
                    var path = '/collection/create/' + $('.collection_id').val();
                    window.location.href = path;
                    alert("Create Card success");
                }
            });  
        })

    </script>
    <script>
        $(document).on('click', '.show-card', function() {
            var id = $(this).attr("id");
            var path = $(this).attr("path");   
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
                    $('.card-collection').children('.container').remove();
                    $('.card-collection').append($(response).html());
                }
            });  
        });
            
        $(document).on('click', '.update-card', function() {
            var id = $(this).attr("data-id");
            var path = $(this).attr("path");   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: path,
                type: "post",
                data: {
                    'id' : id,
                    'front' : $('.front').val(),
                    'back' : $('.back').val()
                },

                success: function(response) {
                    $('.card-collection').children('.container').remove();
                    alert("Update success");
                    $('.card-collection').append($(response).html());
                }
            });  
        });

        $(document).on('click', '.delete-card', function() {
            var id = $(this).attr("data-id");
            var path = $(this).attr("path");   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: path,
                type: "delete",
                data: {
                    'id' : id,
                },

                success: function(response) {
                    var remove = "#card-" + id;
                    $(remove).remove();
                    $('.card-collection').children('.container').remove();
                    $('.card-collection').append($(response).html());
                }
            });  
        });
    </script>
</body>
</html>
