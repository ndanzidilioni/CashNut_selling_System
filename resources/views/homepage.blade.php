
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CACS | Home</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="{{ url('assets/css/styles.min.css') }}">
</head>

<body>
    <div>
        <div class="header-dark" style="background-image: url({{ url('assets/img/groundnuts-3001495_1280.jpg') }});">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">CACS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav"></ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form><span class="navbar-text"></span><a class="btn btn-light action-button" role="button" href="{{ url('register') }}">Sign Up</a><a class="btn btn-light action-button" role="button" href="{{ url('login') }}">logIn</a></div>
                </div>
            </nav>
            <div class="container hero">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <h1 class="text-center" style="background-color: #000000;opacity: 0.56;"><br>cashewnut crop system<br><br></h1>
                                <div class="embed-responsive embed-responsive-16by9" style="height: 86px;opacity: 0;"><iframe class="embed-responsive-item"></iframe></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <div></div>
    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">ccs © 2020</p>
        </footer>
    </div>
    <div></div>
    
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>