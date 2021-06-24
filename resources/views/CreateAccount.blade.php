<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content='{{ csrf_token() }}'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibMan - Create Account</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="container1">
        <h1 class="title">Registration</h1>
        @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
        <form action="/createuser" method="post" autocomplete="off">
            <div class="form-group">
                <input type="text" name="fullname" id="fullname" class='text' autocomplete="no-password" placeholder="enter your fullname">
            </div>    
            <div class="form-group">
                <input type="text" name="emailid" id="emailid" class='text' class="form-control" autocomplete="no-password" placeholder="enter your email-ID">            
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class='password' class="form-control" autocomplete="no-password" placeholder="enter your password">
            </div>
            <div class="form-group">
                <button class="workbut">Register</button>
            </div>
            @csrf
        </form>
        <div class="form-group">
            <a href="/login" class="createcta">Already Have An Account? Sign In Here</a>
        </div>
        <br>
    </div>
</body>
</html>