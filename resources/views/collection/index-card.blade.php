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
        <select class="p-3" name="collection" id="">
            <option value="">Collection 1</option>
            <option value="">Collection 2</option>
        </select>
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
                        <div class="col-8 bg-secondary" style="height: 600px"></div>
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
            <button class="btn btn-primary px-4">FLIP</button>
        </div>
    </div>
</body>
</html>
