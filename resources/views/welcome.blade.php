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
        <div class="side-bar" id="Side-bar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideBar()">&otimes;</a>

            <div class="side-menu">
                <a href="#Home" style="border:0; margin-top: 70px;">
                    <img src="img/logo.png" alt="logo"> </a>
                <a href="#About"> About Us </a>
                <a href="#News"> News </a>
                <a href="#Events"> Events </a>
                <a href="#Gallery"> Gallery </a>
                <a href="#Committe"> Committe </a>
                <a href="#Contact"> Contact Us </a>
                <a href="#Login"> Admin Login </a>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="openSideBar()">
            <i class="fa fa-bars"> </i> </a>

        <div class="nav-bar dynBack" id="Nav-bar">
            <div class="nav-menu">
                <a href="#Home" style="border:0; padding-top:1vh"> <img src="img/logo.png" alt=""> </a>

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

        <div class="flex-center">
            <img  src="img/banner.jpg" alt="banner">
            <h6 class="banner-text"> CSE SOCIETY
            <br>
            <font size="4vh" font-weight="normal"> Metropolitan University </font> </h6>
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
                    <a href="https://www.facebook.com/yc.2797" target="blank">
                        Yeamin Chowdhury </a>
                    <a href="https://www.facebook.com/profile.php?id=100007265493910" target="blank">
                        Alim Uddin </a>
                    <a href="https://github.com/yc27/cse_society" target="blank">
                        GitHub Repository </a>
                </div>
            </div>
        </div>

        <div class="block-center position-ref content">
            <div id="News">
                <h4> TEST </h4>
                <br>
            </div>

            <div id="Eventes">
                <h4> TEST </h4>
                <br>
            </div>

            <div id="Gallery">
                <h4> TEST </h4>
                <br>
            </div>

            <div id="Committe">
                <h4> TEST </h4>
                <br>
            </div>

            <div id="About">
                <h4> TEST </h4>
                <br>
            </div>

            <div id="Contact">
                <h4> TEST </h4>
                <br>
            </div>
        </div>

        <!-- script -->
        <script>
            function openSideBar() {
                document.getElementById("Side-bar").style.width = "200px";
            }
        </script>

        <script>
            function closeSideBar() {
                document.getElementById("Side-bar").style.width = "0%";
            }
        </script>

        <script>
            [red, green, blue] = [33, 40, 61];
            dynBack = document.querySelector('.dynBack');
                h = document.documentElement.clientHeight;
                x = (h * 0.3);
                h = (h-x) * 0.3;

            window.addEventListener('scroll', () => {
                a = Math.min(1.0, (window.scrollY || window.pageYOffset) / h);
                [r, g, b, y] = [red, green, blue, a];
                dynBack.style.background = `rgba(${r}, ${g}, ${b}, ${y})`;
            });
        </script>
    </body>
</html>
