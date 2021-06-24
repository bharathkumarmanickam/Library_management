@if(Cookie::get('email') !== null && Cookie::get('password') !== null)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="{{ asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-light bg-light">

    <a class="navbar-brand" href="#"> <img src="https://tetsocollege.org/wp-content/uploads/2020/08/tetso_strive_R.png" class="brandimage" alt="library Management"> </a>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <button class="btn btn-danger btn-lg" > <a href="logout" class="logout"> Logout</a></button>
        </li>
    </ul>
</nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Library Management Dashboard</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-sm-3">
                <a href="{{URL::to('createbook')}}"style="text-decoration: none;">
                        <div class="card card-change">
                            <div class="card-body card-body-change">
                                <center>
                                <h4 class="card-text"> <strong>CREATE NEW BOOK</strong> </h4>
                                </center>
                            </div>
                        </div>
                    </a>
                </div>

        <div class="col-sm-3">
            <a href="{{URL::to('aoe')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>ADD / EDIT BOOK</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
        <div class="col-sm-3">
        <a href="{{URL::to('checkbooks')}}"style="text-decoration: none;">
                <div class="card card-change">
                    <div class="card-body card-body-change">
                        <center>
                        <h4 class="card-text"><strong>LIBRARY BOOKS</strong></h4>
                        </center>
                    </div>
                </div>
            </a>
        </div>
            <div class="col-sm-3">
            <a href="{{URL::to('searchbook')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>CHECK BOOK</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
            
           
    </div>
    <div class="row">

    <div class="col-sm-3">
            <a href="{{URL::to('bookout')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>BOOK OUT ENTRY</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
    <div class="col-sm-3">
            <a href="{{URL::to('outstanding')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>OUTSTANDING LENDERS</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
    <div class="col-sm-3">
            <a href="{{URL::to('requestclose')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>REQUEST CLOSE</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
    <div class="col-sm-3">
            <a href="{{URL::to('log')}}"style="text-decoration: none;">
                    <div class="card card-change">
                        <div class="card-body card-body-change">
                            <center>
                            <h4 class="card-text"> <strong>LENDER LOGS</strong> </h4>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
    </div>
</body>
</html>
@else
        <script> window.location= "/wronguser"; </script>
@endif