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
        <div class="flashcard">
            <div class="flashcard-inner">
                <div class="card-front">
                    <div class="card-body">
                        <p>{{ count($cards)>0 ? $cards[0]->front : 'Front'}}</p>
                    </div>
                    <div class="card-show-hide">
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
                        <button type="button" class="show-hide" onclick="flipBack()">Hide answer</button>
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
        $('.card-show').children('.card').remove();
        $('.card-show').append($(data).html());
        $('.prev-card').val(page);
    }
    });
    }
});
</script>
    {{-- <script>
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
                $('.card-show').children('.card').remove();
                $('.card-show').append($(data).html());
                $('.prev-card').val(page);
            }
            });
        }
    });  
</script> --}}
