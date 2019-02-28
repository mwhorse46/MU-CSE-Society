<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSE SOCIETY</title>

        <!-- style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>

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
            <a href="#Home" style="padding-top:1vh"> <img src="img/logo.png" alt=""> </a>

            <a href="#About" class="abt"> About Us 
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#News" class="nws"> News
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Events" class="evnt"> Events
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Gallery" class="glry"> Gallery 
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Committe" class="cmte"> Committe 
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Contact" class="cntct"> Contact Us
            <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="{{ route('login') }}"> Admin Login </a>
        </div>

        <div class="banner" id="Home">
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
            </div>

            <div id="Events" class="bg-ash">
                <p class="heading"> Events </p>
            </div>

            <div id="Gallery">
                <p class="heading"> Gallery </p>
            </div>

            <div id="Committe" class="bg-ash">
                <p class="heading"> Committe </p>
            </div>

            <div id="About">
                <p class="heading"> About </p>
            </div>

            <div id="Contact" class="bg-sky">
                <p class="heading" style="color:white"> Contact Us </p>
            </div>

            <div class="footer bg-blue">
                <p> &copy; 2019 CSE Society, Metropolitan University All Rights Reserved.</p>
            </div>
        </div>

        <!-- script -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
