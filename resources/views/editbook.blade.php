@if(Cookie::get('email') !== null && Cookie::get('password') != null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Add/Edit Books</title>
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
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">  Library Management Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Create Book</li>
    </ol>
</nav>
<div class="container">
<center><h2 class='title-style'><strong>Edit Book</strong></h2></center>
 <br>
 @if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    </div>
@endif
 @if(Session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div> 
@endif

@if(Session()->has('bookdet'))
@foreach(session()->get('bookdet') as $bk)    
<form action="/updatebk" method="post">
    @csrf
    <div class="mb-3">
        <label for="bookno" class="form-label">Book No</label>
        <input type="number" class="form-control" id="bookno" name="bookno" value = "{{$bk->bookno}}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="bookname" class="form-label">Book Name</label>
        <input type="text" class="form-control" id="bookname" name="bookname" value="{{$bk->book_name}}">
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">Book ISBN Number</label>
        <input type="text" class="form-control" id="isbn" name="bookisbn" value="{{$bk->isbn_num}}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="pubname" class="form-label">Publisher Name</label>
        <input type="text" class="form-control" id="pubname" name="bookpub" value="{{$bk->Pub_name}}">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stocks</label>
        <input type="text" class="form-control" id="stock" name="stock" value="{{$bk->stock}}">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary btn-block"> Update Book</button>
    </div>
    </form>
    <br>
    @endforeach
@endif
</div>
</body>
</html>
@else
        <script> window.location= "/wronguser"; </script>
@endif