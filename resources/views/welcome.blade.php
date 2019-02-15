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

                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div id="Events" class="bg-ash">
                <p class="heading"> Events </p>

                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div id="Gallery">
                <p class="heading"> Gallery </p>

                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div id="Committe" class="bg-ash">
                <p class="heading"> Committe </p>

                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div id="About">
                <p class="heading"> About </p>

                <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div id="Contact" class="bg-sky">
                <p class="heading" style="color:white"> Contact Us </p>

                <p class="para" style="color:white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
            </div>

            <div class="footer bg-blue">
                <p> &copy; 2019 CSE Society, Metropolitan University All Rights Reserved.</p>
            </div>
        </div>

        <!-- script -->
        <script>
            //changing background opacity of top menu bar
            [red, green, blue] = [33, 40, 61];
            navBar = document.getElementById("Nav-bar");
            window.addEventListener('scroll', () => {
                hh = document.documentElement.clientHeight;
                bb = h * 0.3;
                nav = h * 0.11;
                p = Math.min(1.0, (window.scrollY || window.pageYOffset) / (bb-nav));
                [r, g, b, o] = [red, green, blue, p];
                navBar.style.background = `rgba(${r}, ${g}, ${b}, ${o})`;
            });

            //calculating screen height and nav bar height
            h = document.documentElement.clientHeight;
            nav = h * 0.11;
            //changing scroll position on clicking menu
            $('.abt').click(function(e){
                e.preventDefault();
                var p = $('#About').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
            $('.nws').click(function(e){
                e.preventDefault();
                var p = $('#News').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
            $('.evnt').click(function(e){
                e.preventDefault();
                var p = $('#Events').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
            $('.glry').click(function(e){
                e.preventDefault();
                var p = $('#Gallery').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
            $('.cmte').click(function(e){
                e.preventDefault();
                var p = $('#Committe').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
            $('.cntct').click(function(e){
                e.preventDefault();
                var p = $('#Contact').offset();
                $('body, html').animate({ 'scrollTop': p.top - nav }, 250);
            });
        </script>
    </body>
</html>
