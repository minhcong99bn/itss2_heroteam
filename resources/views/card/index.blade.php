@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="col-1 d-flex flex-row align-items-center">
            <button class="btn prev-card" value="1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z"/>
                </svg>
            </button>
        </div>
        <div class="flashcard" path="{{ route('card.index') }}">
            <div class="flashcard-inner">
                <div class="card-front">
                    <div class="card-body">
                        <p>{{ count($cards)>0 ? $cards[0]->front : 'Front'}}</p>
                    </div>
                    <div class="card-show card-show-hide" data-id="{{ count($cards)>0 ? $cards[0]->id: '' }}" action="{{ route('card-update-schedule') }}">
                        <button type="button" class="show-hide" onclick="flip()">Show answer</button>
                    </div>
                </div>
                <div class="card-back">
                    <div class="card-body">
                        <div class="answer-display">
                            <p><span style="font-weight: bold;">{{ count($cards)>0 ? $cards[0]->back : 'Back' }}</p>
                        </div>
                    </div>
                    <div class="card-show-hide">
                        <div class="d-flex justify-content-around">
                            <div>
                                <button class="btn-easy" style=" background-color: #65C466;">Easy</button>
                            </div>
                            <div>
                                <button  class="btn-hard" style="background-color: #D8A522;">Hard</button>
                            </div>
                            <div>
                                <button  class="btn-veryhard" style="background-color: #AC373A">Very Hard</button>
                            </div>
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
    </section>
    @endsection
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
    function flip() {
        document.querySelector('.flashcard-inner').style.transform = 'rotateY(180deg)';
    }
</script>
<script>
    function flipBack() {
        document.querySelector('.flashcard-inner').style.transform = 'rotateY(0deg)';
    }
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
        var path = $(".flashcard").attr("path");
    $.ajax({
    url: path + "?page="+page,
    type: "get",
    success:function(data)
    {
        window.location.href = path + "?page="+page;
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
                var path = $(".flashcard").attr("path");
    $.ajax({
    url: path + "?page="+page,
    type: "get",
    success:function(data)
    {
        window.location.href = path + "?page="+page;
        $('.prev-card').val(page);
    }
    });
        }
    });  
</script>
<script>
    $(document).on('click', '.btn-veryhard', function() {
        var id = $('.card-show').attr("data-id");
        var path = $('.card-show').attr("action");
        console.log(path);
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
                'id' : id
            },

            success: function(response) {
                console.log(response);
               var path = '/card';
                window.location.href = path;
            }
        });
    });
    $(document).on('click', '.btn-hard', function() {
        var id = $('.card-show').attr("data-id");
        var path = $('.card-show').attr("action");
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
                'id' : id
            },

            success: function(response) {
               var path = '/card';
                window.location.href = path;
            }
        });
    });
    $(document).on('click', '.btn-easy', function() {
        var id = $('.card-show').attr("data-id");
        var path = $('.card-show').attr("action");
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: path,
            type: "post",
            data: {
                'easy' : 1,
                'id' : id
            },

            success: function(response) {
               var path = '/card';
                window.location.href = path;
            }
        });
    });
</script>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', Times, serif;
    box-sizing: border-box;
}
ul{
    list-style: none;
}
.navbar{
    top: 0;
    left: 0;
    display: flex;
    width: 100%;
    justify-content: space-between;
    background-color: #823B40;
    padding-left: 50px;
    padding-right: 50px;
    color: white;
    align-items: center;
}
.navbar img {
    width: 150px;
    height: 60px;
}
.nav-menu {
    display: flex;
    justify-content: space-between;
}
.nav-menu li{
    width: 130px;
    text-align: center;
    margin: 20px;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
}
.container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 70px 50px; 
}
.container .slider-left img, .slider-right img{
    height: 100px;
    width: 100px;
} 
.flashcard{
    width: 860px;
    perspective: 10000px;
}
.flashcard-inner{
    position: relative;
    width: 100%;
    height: 502px;
    transition: transform 0.5s;
    border: 1px solid gray;
    transform-style: preserve-3d;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}  
.card-back{
    transform: rotateY(180deg);
}
.card-front .card-body{
    height: 430px;
    font-size: 60px;
    display: flex;
    padding-top: 160px;
    justify-content: center;
}
.card-back .card-body{
    width: 100%;
    height: 430px;
    padding-left: 50px;
}
.card-back .card-body p {
    font-size: 20px;
    line-height: 40px;
    
}
.card-show{
    width: 100%;
    height: 70px;
    background-color: #E0E0E0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.card-show button{
    background-color: #519CF5;
    border: none;
    color: white;
    padding: 6px 20px;
    font-size: 20px;
    border-radius: 4px;
    cursor: pointer;
}
.card-show-hide{
    width: 100%;
    height: 70px;
    background-color: #E0E0E0;
}
.card-show-hide button{
    margin-top: 18px;
    border: none;
    color: white;
    padding: 6px 20px;
    font-size: 15px;
    border-radius: 4px;
    cursor: pointer;
}
</style>