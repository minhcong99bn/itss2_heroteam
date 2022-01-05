{{-- 
<body>
    <div class="container d-flex justify-content-around">
        <div class="">
            <div class="form-intro">
                <div class="form-title" style="font-weight: 800;">THE <span style="color: #AC373A; font-weight: 800;">FLASH</span> APP</div>
                <p class="form-text"  style="font-weight: 700;">Welcome back</p>
                <p class="text-center" style="font-weight: 700; font-size: 24px;">Please login/sign up to your account</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" id="email" name="name" placeholder="Username" style="margin-top:20px" type="text" :value="old('name')" required autofocus autocomplete="name"><br>
                <input id="email" name="email" placeholder="Email Address" style="margin-top:20px" type="email" :value="old('email')" required><br>
                <input type="password" id="password" name="password" placeholder="Password" style="margin-top:20px" required autocomplete="new-password" ><br>
                <input type="password" id="confirm-password password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" style="margin-top:20px"><br>
                <button  class="btn  btn-primary p-5">Signup</button>
                <a href={{ route('login') }} type="submit" class="btn btn-success" id="signup" >Login</a>
            </form>
        </div>
 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d3db06ed0b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Flash Card</title>
</head>
<body>
    <div class="container d-flex justify-content-around">
        <div class="">
            <div class="form-intro">
                <div class="form-title" style="font-weight: 800;">THE <span style="color: #AC373A; font-weight: 800;">FLASH</span> APP</div>
                <p class="form-text"  style="font-weight: 700;">Welcome back</p>
                <p class="text-center" style="font-weight: 700; font-size: 24px;">Please login/sign up to your account</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" id="email" name="name" placeholder="Username" style="margin-top:20px" type="text" :value="old('name')" required autofocus autocomplete="name"><br>
                <input id="email" name="email" placeholder="Email Address" style="margin-top:20px" type="email" :value="old('email')" required><br>
                <input type="password" id="password" name="password" placeholder="Password" style="margin-top:20px" required autocomplete="new-password" ><br>
                <input type="password" id="confirm-password password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" style="margin-top:20px"><br>
                <div style="margin-top: 50px" class="d-flex text-center">
                    <button class="login mt-5" style="margin-right: 3%; margin-left: 3%; padding: 10px 20px 10px 20px; font-weight: 700; border: 1px solid #AC373A; color: #AC373A; font-size: 17px; background-color:white;">Sign up</button>
                    <a href={{ route('login') }}  class="login" type="submit" style="padding: 10px 20px 10px 20px; font-weight: 700; border: 1px solid #AC373A; color: #AC373A; font-size: 17px; background-color:white; text-decoration: none;" class="" id="signup">Login</a>
                </div>
            </form>
        </div>
        <div class="" style="margin-left: 7%; margin-top: -7%;">
            <img src="{{ asset('storage/images/logo.png') }} " alt="logo">
            <p class="text-center" style="margin-top: -12%; font-weight: 700; font-size: 38px;">Help you learn faster</p>
        </div>
    </div>
</body>
</html>
<style>
    *{
        /* font-family: Poppins; */
    /* margin: 0;
    padding: 0; */
    font-family: 'Poppins';
    box-sizing: border-box;
}

.container {
    display: flex;
    margin-top: 140px;
}
.form-left {
    margin-top: 140px;
    width: 700px;
    /* padding-left: 100px; */
}
.form-title {
    font-size: 60px;
    text-align: center;
    font-weight: normal;
}
.form-text {
    font-size: 25px;
    text-align: center;
}
.input-form{
    justify-content: center;
    padding-left: 80px;
    padding-right: 80px;
}
.input-form input{
    margin-top: 50px;    
}
.input-form input[type=text], input[type=password] , select {
    width: 100%;
    padding: 12px 20px;
    margin-top: 35px;
    margin-bottom: 10px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
#email {
    width: 100%;
    padding: 12px 20px;
    margin-top: 50px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.input-form input[type="submit"] {
    padding: 14px ;
    margin-left: 50px;
    width: 30%;
    color: #AC373A;
    border: 1px solid #AC373A;
    background-color: transparent;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #AC373A;
    color: white;
}
.form-right{
    margin-left: 150px
}
img {
    width: 600px;
    height: 250px;
    margin: 130px 10px;
}
.form-right p{
    font-size: 45px;
    text-align: center;
}
</style>
