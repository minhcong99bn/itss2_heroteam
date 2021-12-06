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
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-lg btn-success">Home</a>
        </div>
        <form id="myForm" action="">
            @csrf
            <select class="p-3" name="collection" id="select" onChange=selectChange(this.value)>
                @foreach ($collection as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </form>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-1 d-flex flex-row align-items-center">
                <button class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z"/>
                    </svg>
                </button>
            </div>
            <div class="col-10">
                <div class="container">
                    <div class="row ">
                        <div class="col-8 bg-secondary" style="height: 600px">
                            <div class="card" onclick="flip()">
                                <div class="front">Apple</div>
                                <div class="back">Quả táo</div>
                            </div>
                        </div>
                        <div class="col-4 border d-flex flex-row align-items-center justify-content-center">
                            <div class="d-flex flex-column">
                                <button class="btn btn-light border">EASY</button>
                                <button class="btn btn-light border mt-5">HARD</button>
                                <button class="btn btn-light border mt-5">VERY HARD</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 d-flex flex-row align-items-center">
                <button class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="row d-flex justify-content-center my-4">
            <button class="btn btn-primary px-4" onclick="flip()">FLIP</button>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>
        function flip() {
            $('.card').toggleClass('flipped');
        }
    </script>
    <script>
        function selectChange(val) {
            //Set the value of action in action attribute of form element.
            //Submit the form
            $('#myForm').submit();
        }
        </script>
</body>
</html>
