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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-left">
            <div class="form-intro">
                <div class="form-title">THE <span style="color: #AC373A">FLASH</span> APP</div>
                <p class="form-text">Please sign up to your account</p>
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
        <div class="form-right">
            <img src="{{ asset('storage/images/logo.png') }} " alt="logo">
            <p>Help you learn faster</p>
        </div>
    </div>
</body>
</html>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

.container {
    display: flex;
}
.form-left {
    margin-top: 140px;
    width: 700px;
    padding-left: 100px;
}
.form-title {
    font-size: 60px;
    text-align: center;
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
    margin-bottom: 10px;
    
}
.input-form input[type=text], input[type=password] , select {
    width: 100%;
    padding: 12px 20px;
    margin-top: 50px;
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
    margin-bottom: 10px;
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
.form-right img {
    width: 600px;
    height: 250px;
    margin: 130px 10px;
}
.form-right p{
    font-size: 45px;
    text-align: center;
}

</style>