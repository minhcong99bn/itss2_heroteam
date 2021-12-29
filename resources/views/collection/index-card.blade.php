<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コレクション</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            width: 100%;
            height: 100%;
            margin-left: -15px;
            position: absolute;
            -webkit-transition: -webkit-transform 1s;
            -moz-transition: -moz-transform 1s;
            -o-transition: -o-transform 1s;
            transition: transform 1s;
            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            -o-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transform-origin: 50% 50%;
        }
        .card div {
            display: block;
            height: 100%;
            width: 100%;
            line-height: 500px;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 100px;
            position: absolute;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -o-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .card .front {
            background: black;
        }
        .card .back {
            background: black;
            -webkit-transform: rotateY( 180deg );
            -moz-transform: rotateY( 180deg );
            -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
        }
        .card.flipped {
            -webkit-transform: rotateY( 180deg );
            -moz-transform: rotateY( 180deg );    
            -o-transform: rotateY( 180deg );    
            transform: rotateY( 180deg );
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="col-sm-6">
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-lg btn-success">ホーム</a>
        </div>
        <form id="myForm" action="">
            @csrf
            <select class="p-3" path="{{ route('card.index') }}" name="collection" id="select">
                <option>コレクションを選択</option>
                @foreach ($collection as $item)
                    @if ($item->level == -1)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                    @if ($item->level != 0 && new DateTime($item->schedules->default) <= new DateTime($now) )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                    @if ($item->level == 0 && new DateTime($item->schedules->custom) <= new DateTime($now))
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-1 d-flex flex-row align-items-center">
                <button class="btn prev-card" value="1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z"/>
                    </svg>
                </button>
            </div>
            <div class="col-10">
                <div class="container">
                    <div class="row ">
                        <div class="col-8 bg-secondary card-show" value="1" style="height: 600px">
                            <input class="input-data" value="1" hidden> 
                           
                                <div class="card" onclick="flip()">
                                    <div class="front">フロント</div>
                                    <div class="back">裏側</div>
                                </div>
                        </div>
                        <div class="col-4 border d-flex flex-row align-items-center justify-content-center">
                            <div class="d-flex flex-column">
                                <input class="level" hidden value="{{ route('card.schedule.easy') }}">
                                <button class="btn btn-light border btn-easy">簡単</button>
                                <button class="btn btn-light border mt-5 btn-hard">難しい</button>
                                <button class="btn btn-light border mt-5 btn-veryhard">とても難しい</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 d-flex flex-row align-items-center">
                <button class="btn next-page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="row d-flex justify-content-center my-4">
            <button class="btn btn-primary px-4" onclick="flip()">フリップ</button>
        </div>
    
    </div>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>
        function flip() {
            $('.card').toggleClass('flipped');
        }
    </script>
    <script>
        $(document).on('change', '#select', function() {
            var id = $(this).val();
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
                    $('.input-data').remove();
                    $('.card-show').children('.card').remove();
                    $('.card-show').append($(response).html());
                }
            });  
        });
        </script>
<script>
    $(document).ready(function(){

    $(document).on('click', '.next-page', function(event){
        event.preventDefault(); 
        var page = $(".prev-card").val();
        var page = page++;
        fetch_data(page+1);
    });

    function fetch_data(page)
    {
        var id = $("#select").val();
        var path = $("#select").attr("path"); 
    $.ajax({
    url: path + "?page="+page,
    type: "get",
    data: {
        'id' : id,
    },
    success:function(data)
    {
        $('.input-data').remove();
        $('.card-show').children('.card').remove();
        $('.card-show').append($(data).html());
        $('.prev-card').val(page);
    }
    });
    }
});
    </script>
    <script>
         $(document).ready(function(){
        $(document).on('click', '.prev-card', function(event){
            event.preventDefault(); 
            var page = $(".prev-card").val();
            var page = page--;
            fetch_data(page-1);
        });

        function fetch_data(page)
        {
            var id = $("#select").val();
            var path = $("#select").attr("path"); 
        $.ajax({
        url: path + "?page="+page,
        type: "get",
        data: {
            'id' : id,
        },
        success:function(data)
        {
            $('.input-data').remove();
            $('.card-show').children('.card').remove();
            $('.card-show').append($(data).html());
            $('.prev-card').val(page);
        }
        });
    }
});
    
    </script>
    <script>
        $(document).on('click', '.btn-easy', function() {
            var path = $('.level').val();
            var collectionId = $('#select').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: path,
                type: "get",
                data: {
                    'easy' : 1,
                    'collection_id' : collectionId
                },

                success: function(response) {
                    alert("レベル通過おめでとうございます。 あなたのレベルは :  " + response);
                   var path = '/collection/index';
                    window.location.href = path;
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.btn-hard', function() {
            var path = $('.level').val();
            var collectionId = $('#select').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: path,
                type: "get",
                data: {
                    'hard' : 1,
                    'collection_id' : collectionId
                },

                success: function(response) {
                    alert("レベルアップしません。 あなたのレベルは :  " + response);
                   var path = '/collection/index';
                    window.location.href = path;
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.btn-veryhard', function() {
            var path = $('.level').val();
            var collectionId = $('#select').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: path,
                type: "get",
                data: {
                    'veryhard' : 1,
                    'collection_id' : collectionId
                },

                success: function(response) {
                   alert("あなたはレベルダウンしました、あなたのレベルは :  " + response);
                   var path = '/collection/index';
                    window.location.href = path;
                }
            });
        });
    </script>
</body>
</html>
