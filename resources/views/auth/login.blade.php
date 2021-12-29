<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d3db06ed0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('css')}}/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="form-left">
            <div class="form-intro">
                <div class="form-title">THE <span style="color: #AC373A">FLASH</span> APP</div>
                <p class="form-text">Welcome back<br>Please login/sign up to your account</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="input-form">
                @csrf
                <div>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>                
                <input type="submit" id="login" value="Login">
                <div>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 btn btn-secondary text-sm text-gray-700 dark:text-gray-500">Sign in</a>
                    @endif
                </div>
            </form>
        </div>
        <div class="form-right">
            <img src="{{asset('img')}}/logo.png" alt="logo">
            <p>Help you learn faster</p>
        </div>
    </div>
    </x-guest-layout>
</body>
</html>
