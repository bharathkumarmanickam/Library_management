<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <div class="container1">
        <h1 class="title">Login</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif        
        <form action="/checklogin" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="username" id="username" class="text" value="bharath@gmail.com" autocomplete="new-password" placeholder="enter your mail id" >
                </div>
                <div class="form-group">
                <input type="password" name="password" id="password" class="text" value="bharath12345" autocomplete="new-password" placeholder="enter the password" >
                </div>
                <div>
                    <a href="#" class="forgot">Forgot Password ?</a>
                </div>
                <div class="form-group">
                
                <button class="workbut">Log-In</button>
                </div>
                @csrf
    </form>
        <a href="/createaccount" class="createcta">New User? Register Here</a>
        <br><br>
    </div>
</body>
</html>