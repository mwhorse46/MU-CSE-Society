<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSE SOCIETY</title>

        <!-- style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!-- script -->
        <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed|Open+Sans:400,700">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700">
    </head>

    <body>
        <div class="side-bar" id="Side-bar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideBar()">&lAarr;</a>

            <div class="side-menu">
                <a href="#Home" style="border:0; margin-top: 70px;">
                    <img src="img/logo.png" alt="logo"> </a>
                <a href="#About"> About Us </a>
                <a href="#News"> News </a>
                <a href="#Events"> Events </a>
                <a href="#Gallery"> Gallery </a>
                <a href="#Committe"> Committe </a>
                <a href="#Contact"> Contact Us </a>
                <a href="{{ route('login') }}"> Admin Login </a>
            </div>
        </div>
        <a href="javascript:void(0);" class="openbtn" onclick="openSideBar()"> &rAarr; </a>

        <div class="nav-bar" id="Nav-bar">
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

            <a href="{{ route('login') }}"> Admin Login </a>
        </div>

        <div class="banner">
            <img  src="img/banner.jpg" alt="banner">
            <h6 class="banner-text"> CSE SOCIETY
            <br>
            <font size="4vh" font-weight="normal"> Metropolitan University </font> </h6>
        </div>

        <div class="flex-center position-ref">
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
                <p class="heading"> News </p>
                <br>
            </div>

            <div id="Eventes">
                <p class="heading"> Events </p>
                <br>
            </div>

            <div id="Gallery">
                <p class="heading"> Gallery </p>
                <br>
            </div>

            <div id="Committe">
                <p class="heading"> Committe </p>
                <br>
            </div>

            <div id="About">
                <p class="heading"> About </p>
                <br>
            </div>

            <div id="Contact">
                <p class="heading"> Contact Us </p>
                <br>
            </div>
        </div>

        <!-- script -->
        <script>
            //changing background opacity of top menu bar
            [red, green, blue] = [33, 40, 61];
            navBar = document.getElementById("Nav-bar");
            h = document.documentElement.clientHeight;
            x = (h * 0.3);
            h = x - (h * 0.11);

            window.addEventListener('scroll', () => {
                a = Math.min(1.0, (window.scrollY || window.pageYOffset) / h);
                [r, g, b, y] = [red, green, blue, a];
                navBar.style.background = `rgba(${r}, ${g}, ${b}, ${y})`;
            });
        </script>
    </body>
</html>
