@if(Cookie::get('email') !== null && Cookie::get('password') !== null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outstanding Lenders</title>
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
        <li class="breadcrumb-item active" aria-current="page">Outstanding Lenders</li>
    </ol>
</nav>

<div class="container">
<center><h2 class='title-style'><strong>OUTSTANDING LENDERS</strong></h2></center>
    <br>
  
    <table class="table table-striped">
    <thead>
        <th scope="col">Book No</th>
        <th scope="col">Lender Name</th>
        <th scope="col">Lender Address</th>
        <th scope="col">Lender Contact</th>
        <th scope="col">From Date</th>
        <th scope="col">To Date</th>
        <th scope="col">Token</th>
        <th scope="col">Status</th>
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
        <th> <div class="alert alert-danger">Pending Submission</div> </th>
        </tr>
        @endforeach
      
      
    </tbody>
</table>

   <br><br>
</div>
    
</body>
</html>
@else
    <script>window.location= "/wronguser"; </script>

@endif