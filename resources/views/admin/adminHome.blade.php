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
        <a href="javascript:void(0)" class="btnClose" onclick="closeSideBar()">&lAarr;</a>

        <div class="side-menu">
            <a href="#Home" style="border:0; margin-top: 70px;">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="icon-logo"> </a>
            <a href="#News"> News </a>
            <a href="#Events"> Events </a>
            <a href="#Gallery"> Gallery </a>
            <a href="#Committee"> Committee </a>
            <a href="{{ URL::to('/admin/inbox') }}"> Inbox </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <a href="javascript:void(0);" class="btnOpen" onclick="openSideBar()"> &rAarr; </a>

    <div class="nav-bar" style="background:rgb(33, 40, 61);">
        <div class="left-menu">
            <a href="#Home" style="padding-top:1vh" class="home"> <img src="{{ asset('img/logo.png') }}" alt="logo" class="icon-logo"> </a>

            <a href="#Home" class="home"> Home
                <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#News" class="nws"> News
                <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Events" class="evnt"> Events
                <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Gallery" class="glry"> Gallery
                <span class="vertical-bar"> &nbsp; </span> </a>

            <a href="#Committee" class="cmte"> Committee </a>
        </div>

        <div class="right-menu">
            <a> {{ Auth::user()->name }} </a>
            <a href="{{ URL::to('/admin/inbox') }}"> <img src="{{ asset('img/inbox.png') }}" class="icon-inbox"> </a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <img src="{{ asset('img/logout.png') }}" class="icon-logout">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <div id="Home" class="blank"> &nbsp;</div>

    <div class="block-center position-ref content">
        <div id="News">
            <p class="heading-control"> News <a href="{{ route('news') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>
            <?php
            $cnt = 1;
            foreach ($pinned as $pinned) {
                $date = \DateTime::createFromFormat('Y-m-d', $pinned->date)->format('d M, Y');

                echo "<div class=\"row-odd-news\">";
                if ($pinned->image !== null) {
                    echo "
                        <div class=\"news-image\">
                            <img src=\"" . asset('images/' . $pinned->image) . "\" alt=\"" . $pinned->image . "\" width=\"100%\" height=\"auto\">
                        </div>
                        <div class=\"news-news\">
                            <button class=\"btnPin icon-pin\">Pinned News</button>
                            <h2> " . $pinned->title . " </h2>
                            <h5> " . $date . " </h5>
                            <p> " . $pinned->news . " </p>
                        </div>
                    ";
                } else {
                    echo "
                        <div class=\"news-news-full\">
                            <button class=\"btnPin icon-pin\">Pinned News</button>
                            <h2> " . $pinned->title . " </h2>
                            <h5> " . $date . " </h5>
                            <p> " . $pinned->news . " </p>
                        </div>
                    ";
                }
                echo "</div>";

                $cnt = $cnt + 1;
            }
            foreach ($news as $news) {
                $date = \DateTime::createFromFormat('Y-m-d', $news->date)->format('d M, Y');
                if ($cnt % 2 === 1) {
                    echo "<div class=\"row-odd-news\">";
                    if ($news->image !== null) {
                        echo "
                            <div class=\"news-image\">
                                <img src=\"" . asset('images/' . $news->image) . "\" alt=\"" . $news->image . "\" width=\"100%\" height=\"auto\">
                            </div>
                            <div class=\"news-news\">
                                <h2> " . $news->title . " </h2>
                                <h5> " . $date . " </h5>
                                <p> " . $news->news . " </p>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class=\"news-news-full\">
                                <h2> " . $news->title . " </h2>
                                <h5> " . $date . " </h5>
                                <p> " . $news->news . " </p>
                            </div>
                        ";
                    }
                    echo "</div>";
                } else {
                    echo "<div class=\"row-even-news\">";
                    if ($news->image !== null) {
                        echo "
                            <div class=\"news-news\">
                                <h2> " . $news->title . " </h2>
                                <h5> " . $date . " </h5>
                                <p> " . $news->news . " </p>
                            </div>
                            <div class=\"news-image\">
                                <img src=\"" . asset('images/' . $news->image) . "\" alt=\"" . $news->image . "\" width=\"100%\" height=\"auto\">
                            </div>
                        ";
                    } else {
                        echo "
                            <div class=\"news-news-full\">
                                <h2> " . $news->title . " </h2>
                                <h5> " . $date . " </h5>
                                <p> " . $news->news . " </p>
                            </div>
                        ";
                    }
                    echo "</div>";
                }
                $cnt = $cnt + 1;
            }
            ?>
        </div>

        <div id="Events" class="bg-ash">
            <p class="heading-control"> Events <a href="{{ route('events') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>

            <p class="sub-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa. </p>
        </div>

        <div id="Gallery">
            <p class="heading-control"> Gallery <a href="{{ route('gallery') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>

            <p class="sub-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa. </p>
        </div>

        <div id="Committee" class="bg-ash">
            <p class="heading-control"> Committee <a href="{{ route('committee') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>

            <p class="sub-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
        </div>

        <div class="footer bg-blue">
            <p> &copy; 2019 CSE Society, Metropolitan University All Rights Reserved.</p>
        </div>
    </div>

    <!-- script -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html> 