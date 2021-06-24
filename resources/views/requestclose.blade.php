@if(Cookie::get('email') !== null && Cookie::get('password') !== null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
</head>
<body>
<nav class="navbar navbar-light bg-light">

<a class="navbar-brand" href="#"> <img src="https://tetsocollege.org/wp-content/uploads/2020/08/tetso_strive_R.png" class="brandimage" alt="library Management"> </a>
<ul class="nav justify-content-end">
    <li class="nav-item">
        <button class="btn btn-danger btn-lg">Logout</button>
    </li>
</ul>
</nav>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item active" >Library Management Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Close Request</li>
    </ol>
</nav>

<div class="container">
<center><h2 class='title-style'><strong>Lender Request Close</strong></h2></center>
    <br>
    @if($errors->any())
    <ul>
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)

                <li> {{$error}} </li>
            @endforeach
            </div>
        </ul>
    @endif
    @if(Session()->has('message'))
    <div class="alert alert-danger">
        {{session()->get('message')}}
    </div>
    @endif
    @if(Session()->has('messagee'))
    <div class="alert alert-success">
        {{session()->get('messagee')}}
    </div>
    @endif
   <form action="close" method="post">
    @csrf
        <div class="mb-3">
            <label for="token">Token Number</label>
            <input type="text" name="token" class="form-control" id="token" placeholder="token">
        </div>
        <div class="mb-3">
        <button class="btn btn-primary btn-block">Search Lender</button>
        </div>
   </form>
   <br>

  
    @if(session()->has('details'))
         
    <table class="table table-striped">
    <thead>
        <th scope="col">Book No</th>
        <th scope="col">Lender Name</th>
        <th scope="col">Lender Address</th>
        <th scope="col">Lender Contact</th>
        <th scope="col">From Date</th>
        <th scope="col">To Date</th>
        <th scope="col">Token</th>
        <th scope="col">Request</th>
    </thead>

    <tbody>
        
        @foreach(session()->get('lend') as $lend)
        <tr>
        <th> {{ $lend->bookno }} </th>
        <th> {{ $lend->name }} </th>
        <th> {{ $lend->address}} </th>
        <th> {{ $lend->connum }} </th>
        <th>{{$lend->fromdate}}</th>
        <th> {{ $lend->todate}} </th>
        <th> {{ $lend->token }} </th>
        <form action="closereq" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $lend->token }}">
        <th> <button class="btn btn-danger" name="close" value="{{$lend->bookno}}">close request</button> </th>
        </form>
        </tr>
        @endforeach
      
      
    </tbody>
</table>
    @endif
   
   <br><br>
</div>
    
</body>
</html>
@else
    <script>window.location= "/wronguser"; </script>

@endif