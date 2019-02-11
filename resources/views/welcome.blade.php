<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSE SOCIETY</title>

        <!-- style -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed|Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">

        <!-- icon -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="flex-center">
            <img  src="img/background.jpg" alt="banner">
            <h6 class="banner-text"> CSE SOCIETY
                <br>
                <font size="5vh"> Metropolitan University </font> </h6>
        </div>

        <div class="overlay">
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"> </i> </a>

                <div class="menu" id="navmenu">
                    <a href="#Home" style="border:0"> <img src="img/logo.png" alt=""> </a>
                    <a href="#About"> About Us 
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#News"> News
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#Events"> Events
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#Gallery"> Gallery 
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#Committe"> Committe 
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#Contact"> Contact Us
                    <span class="vertical-bar"> &nbsp; </span> </a>

                    <a href="#Login"> Admin Login </a>
                </div>
        </div>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CSE SOCIETY
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        <!-- script -->
        <script>
            function myFunction() {
                var x = document.getElementById("navmenu");
                if (x.className === "menu") {
                    x.className += " responsive";
                } else {
                    x.className = "menu";
                }
            }
        </script>
    </body>
</html>
