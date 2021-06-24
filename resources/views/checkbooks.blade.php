@if(Cookie::get('email') !== null && Cookie::get('password') !== null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Books</title>
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
        <li class="breadcrumb-item active" aria-current="page">Library Books</li>
    </ol>
</nav>
<div class="container">


<table class="table table-striped">
    <thead>
        <th scope="col">Book No</th>
        <th scope="col">Book Name</th>
        <th scope="col">Book ISBN</th>
        <th scope="col">Book Publisher</th>
        <th scope="col">Stocks</th>
    </thead>

    <tbody>
        
        @foreach($books->all() as $book)
        <tr>
        <th> {{ $book->bookno }} </th>
        <th> {{ $book->book_name }} </th>
        <th> {{ $book->isbn_num}} </th>
        <th> {{ $book->Pub_name }} </th>
        <th>{{$book->stock}}</th>
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