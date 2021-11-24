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
                        <span class="text-light mr-2">Collection 1</span>
                        <button class="btn btn-light rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col card mr-3"></div>
                            <div class="col card"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col card mr-3"></div>
                            <div class="col card"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col card mr-3"></div>
                            <div class="col card"></div>
                        </div>
                    </div>
                    <div class="d-flex container my-3 justify-content-center flex-row">
                        <div class="btn btn-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-8 bg-light">
                <div class="container my-5">
                    <div class="row mx-4">
                        <div class="col d-flex flex-column justify-content-center">
                            <div class="card-front bg-secondary border mb-4">
                                <div class="text-center text-white my-4">Front</div>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                        <div class="col d-flex flex-column">
                            <div class="card-back bg-secondary border mb-4">
                                <div class="text-center text-white my-4">Back</div>
                            </div>
                            <button class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
