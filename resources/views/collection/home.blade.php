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
        <button type="button" class="btn btn-lg btn-success">Home</button>
    </div>
    <div class="col-sm-6 ">
        <div class="float-right">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
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
    <div class="row justify-content-center">
        <div class="col-sm-6 ">
            <div class="m-3"><button type="button" class="btn btn-lg btn-outline-dark btn-block">復習スケジュールを管理</button></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6 ">
            <div class="m-3"><a href="{{ route('collection.index') }}" type="button" class="btn btn-lg btn-outline-dark btn-block">コレクションを管理</a></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6 ">
            <div class="m-3"><button type="button" class="btn btn-lg btn-outline-dark btn-block">コレクションを見る</button></div>
        </div>
    </div>
</div>

</body>
</html>
