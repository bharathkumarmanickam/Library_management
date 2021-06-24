<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
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
        <li class="breadcrumb-item active" aria-current="page">Search Books</li>
    </ol>
</nav>
    <div class="container">
    <center><h2 class='title-style'><strong>Search Book</strong></h2></center>
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
        <form action="/search" method="post">
        @csrf
            <div class="mb-3">
                <input type="text" name="bookname" class="form-control" placeholder="enter the book name" id="bookname">               
            </div>
            <div class="mb-3">
            <button class="btn btn-primary btn-block">Search Book</button>    
            </div>
            <br>
        </form>
        @if(Session()->has('result'))
        <hr>

        <table class="table table-striped">
    <thead>
        <th scope="col">Book No</th>
        <th scope="col">Book Name</th>
        <th scope="col">Book ISBN</th>
        <th scope="col">Book Publisher</th>
    </thead>

    <tbody>
        
        @foreach(session()->get('result') as $book)
        <tr>
        <th> {{ $book->bookno }} </th>
        <th> {{ $book->book_name }} </th>
        <th> {{ $book->isbn_num}} </th>
        <th> {{ $book->Pub_name }} </th>
        </tr>
        @endforeach
      
      
    </tbody>
</table> 
@endif
@if(Session()->has('failresult'))
    <div class="alert alert-danger">
    {{session()->get('failresult')}}
    </div>
 @endif
 <br>
    </div>
</body>
</html>