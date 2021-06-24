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
        <li class="breadcrumb-item active" aria-current="page">Book Lending</li>
    </ol>
</nav>

<div class="container">
<center><h2 class='title-style'><strong>Book Lending</strong></h2></center>
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
    <div class="alert alert-success">
        {{session()->get('message')}} <p>Successfully Submitted</p>
    </div>
    @endif
    <form action="/lend" method="post">
    @csrf
    <div class="mb-3">
            <label for="name">Book Name</label>
            <select name="bookno" id="name" class="form-control">
                <option value="">Select the book</option>
             
                @foreach(Session()->get('lendbook') as $book)
                <option value="{{$book->bookno}}">{{$book->book_name}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="enter the full name of lender" id="name">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" placeholder="enter the address of lender" id="address">
        </div>
        <div class="mb-3">
            <label for="contact">Contact Number</label>
            <input type="number" name="contact" class="form-control" placeholder="enter the contact number of lender" id="contact">
        </div>
        <div class="mb-3">
            <label for="fromdate">From Date</label>
            <input type="date" name="fromdate" class="form-control" placeholder="enter the lending date" id="fromdate">
        </div>
        <div class="mb-3">
            <label for="todate">Returning Date</label>
            <input type="date" name="todate" class="form-control" placeholder="enter the returning date" id="todate">
        </div>

        <div class="mb-3">
            <button class="btn btn-primary btn-block">Submit</button>
        </div>
        <br>
    </form>
</div>
    
</body>
</html>
@else
    <script>window.location= "/wronguser"; </script>

@endif