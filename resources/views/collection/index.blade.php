<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

<br>

<div class="container">
    <div class="row collections-view justify-content-around align-items-center"> 
            <div class="col-sm-4 border-right border-dark">
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 1</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 4</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 7</div>
            </div>
            <div class="col-sm-4 border-right border-dark">
                <div class = "p-3 m-3 border bg-light float-center text-center">Collection 2</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 5</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 8</div>
            </div>
            <div class="col-sm-4">
                <div class = "p-3 m-3 border bg-light float-center text-center">Collection 3</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 6</div>
                <div class = "p-3 m-3 border bg-light float center text-center">Collection 9</div>
            </div>
    </div>
    
    <div class = "row ">
        <div class = "col-lg-12">
            <div class="float-right">
                <button class = "btn btn-lg btn-primary">
                    New Collection
                </button>
            </div>
        </div>
    </div>

</body>
</html>
