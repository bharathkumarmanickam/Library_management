@if(Cookie::get('email') !== null && Cookie::get('password') !== null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lender Logs</title>
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
        <li class="breadcrumb-item active" aria-current="page">Lender Logs</li>
    </ol>
</nav>
<div class="container">

  
<table class="table table-striped">
    <thead>
        <th scope="col">SNo</th>
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
        @php
        $i=1
        @endphp
        @foreach($logs->all() as $log)
        <tr>
        <th>@php
        echo($i)
        @endphp</th>
        <th> {{ $log->bookno }} </th>
        <th> {{ $log->name }} </th>
        <th> {{ $log->address}} </th>
        <th> {{ $log->connum }} </th>
        <th>{{$log->fromdate}}</th>
        <th> {{ $log->todate}} </th>
        <th> {{ $log->veri }} </th>
        @php
        $i++
        @endphp
        @if($log->veri == 0)
        <th> <div class="alert alert-danger">Pending Submission</div> </th>
        @else
        <th> <div class="alert alert-success">Returned Successfully</div> </th>
        @endif
        </tr>
        @endforeach
      
      
    </tbody>
</table>
   
    </div>
</body>
</html>
@else 
<script> window.location= "/wronguser"; </script>
@endif