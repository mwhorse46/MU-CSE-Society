<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CSE SOCIETY</title>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- style animation -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">

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
            <p class="heading-control" style="margin-top: 10px"> News <a href="{{ route('news') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>
            <?php
            $cnt = 1;
            foreach ($pinned as $pinned) {
                $date = \DateTime::createFromFormat('Y-m-d', $pinned->date)->format('l, d F, Y');

                echo "<div class=\"wow slideInUp row-flex\">";
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
                $date = \DateTime::createFromFormat('Y-m-d', $news->date)->format('l, d F, Y');
                if ($cnt % 2 === 1) {
                    echo "<div class=\"wow slideInUp row-flex\">";
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
                    echo "<div class=\"wow slideInUp row-even-news row-flex\">";
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

        <div id="Events" class="bg-ash sub-content">
            <p class="heading-control"> Events <a href="{{ route('events') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>

            <div class="row-flex">
                @php
                $delay = 0.0
                @endphp
                @foreach($newEvent as $new)
                <div class="wow slideInUp column-300" data-wow-delay="{{ $delay.'s' }}">
                    <?php
                    $color = mt_rand(0, 4);
                    echo "<h3 class=\"event-title icon-new bg" . $color . "\">
                    <center> " . $new->title . " </center>
                </h3>";
                    ?>
                    <h5 class="table-data-head event-date">
                        <div class="weekday">
                            {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('l') }}
                        </div>
                        <div class="date-month">
                            {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('d M,') }}
                        </div>
                        <div class="year">
                            {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('Y') }}
                        </div>
                    </h5>
                    <h5 class="table-data-head">
                        @if ($new->stime !== null)
                        {{ \DateTime::createFromFormat('H:i:s', $new->stime)->format('h:i A') }} -
                        @endif

                        @if ($new->etime !== null)
                        {{ \DateTime::createFromFormat('H:i:s', $new->etime)->format('h:i A') }}
                        @endif
                    </h5>
                    @if ($new->place !== null)
                    <h5 class="table-data-head">
                        At: {{ $new->place }}
                    </h5>
                    @endif

                    @if($new->image !== null)
                    <img src="{{ asset( 'images/'.$new->image ) }}" alt="{{ $new->image }}" width="100%" height="auto">
                    @endif

                    <p style="text-align: justify; padding: 4px 10px;"> {{ $new->description }} </p>
                    @if ($new->registration !== null)
                    <h5 class="table-data-head">
                        Registration Link: {{ $new->registration }}
                    </h5>
                    @endif
                    @if ($new->photos !== null)
                    <h5 class="table-data-head">
                        Photo Album: {{ $new->photos }}
                    </h5>
                    @endif
                </div>
                @php
                $delay = $delay + 0.15
                @endphp
                @endforeach

                @foreach($oldEvent as $old)
                <div class="wow slideInUp column-300" data-wow-delay="{{ $delay.'s' }}">
                    <?php
                    $color = mt_rand(0, 4);
                    echo "<h3 class=\"event-title bg" . $color . "\">
                    <center>" . $old->title . "</center>
                </h3>";
                    ?>
                    <h5 class="table-data-head event-date">
                        <div class="weekday">
                            {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('l') }}
                        </div>
                        <div class="date-month">
                            {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('d M,') }}
                        </div>
                        <div class="year">
                            {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('Y') }}
                        </div>
                    </h5>
                    <h5 class="table-data-head">
                        @if ($old->stime !== null)
                        {{ \DateTime::createFromFormat('H:i:s', $old->stime)->format('h:i A') }} -
                        @endif

                        @if ($old->etime !== null)
                        {{ \DateTime::createFromFormat('H:i:s', $old->etime)->format('h:i A') }}
                        @endif
                    </h5>
                    @if ($old->place !== null)
                    <h5 class="table-data-head">
                        At: {{ $old->place }}
                    </h5>
                    @endif

                    @if($old->image !== null)
                    <img src="{{ asset( 'images/'.$old->image ) }}" alt="{{ $old->image }}" width="100%" height="auto">
                    @endif

                    <p style="text-align: justify; padding: 4px 10px;"> {{ $old->description }} </p>

                    @if ($old->registration !== null)
                    <h5 class="table-data-head">
                        Registration Link: {{ $old->registration }}
                    </h5>
                    @endif
                    @if ($old->photos !== null)
                    <h5 class="table-data-head">
                        Photo Album: {{ $old->photos }}
                    </h5>
                    @endif
                </div>
                @php
                $delay = $delay + 0.15
                @endphp
                @endforeach
            </div>
        </div>

        <div id="Gallery" class="sub-content">
            <p class="heading-control"> Gallery <a href="{{ route('gallery') }}" class="btnControl"> Go To Control Page &roarr; </a> </p>

            <div class="row-flex">
                @foreach($albums as $album)
                <div class="column-album-wrapper">
                    <div style="width:100%">
                        <a href="{{ asset('/admin/gallery/ShowAlbum?id='.$album->id) }}" class="album-link">
                            <div class="column-album">
                                <img src="{{ asset('images/'.$album->coverImage) }}" alt="">
                                <h3 style="margin:0; padding:10px;"> {{$album->albumName}} </h3>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="Committee" class="bg-ash sub-content">
            <p class="heading-control"> Committee <a href="{{ route('committee') }}" class="btnControl"> Go To Control Page &roarr; </a> </p> 

            <div class="selector">
                <p>Select from working period :</p>
                <select id="Period-Select" class="select-period">
                    @php
                    $start = 2017;
                    $now = new DateTime();
                    $end = $now->format('Y');
                    @endphp
                    @for($i = $end; $i >= $start; $i--)
                    <option value="{{ $i }}">
                        {{ $i }}
                    </option>
                    @endfor
                </select>
            </div>

            <div class="row-flex">
                @php ($delay = 0.0)
                @foreach($topMember as $member)
                <div class="wow slideInUp column-300 column-member {{ $member->session }}" data-wow-delay="{{ $delay.'s' }}">
                    <img class="img-member" src="{{ asset( 'images/'.$member->image ) }}" alt="{{ $member->image }}">
                    <div class="info-member">
                        <h2>{{ $member->name }}</h2>
                        <h3>{{ $member->role }}</h3>
                        <h5>{{ $member->mail }}</h5>
                        <h6>{{ $member->contact }}</h6>
                    </div>
                    <div class="works-member">
                        <strong>Works: </strong>{{ $member->work }}
                    </div>
                </div>
                @php ($delay = $delay + 0.15)
                @endforeach

                @foreach($others as $member)
                <div class="wow slideInUp column-300 column-member {{ $member->session }}" data-wow-delay="{{ $delay.'s' }}">
                    <img class="img-member"  src="{{ asset( 'images/'.$member->image ) }}" alt="{{ $member->image }}">
                    <div class="info-member">
                        <h2>{{ $member->name }}</h2>
                        <h3>{{ $member->role }}</h3>
                        <h5>{{ $member->mail }}</h5>
                        <h6>{{ $member->contact }}</h6>
                    </div>
                    <div class="works-member">
                        <strong>Works: </strong>{{ $member->work }}
                    </div>
                </div>
                @php ($delay = $delay + 0.15)
                @endforeach
            </div>
        </div>

        <div class="footer bg-blue">
            <p> &copy; 2019 CSE Society, Metropolitan University All Rights Reserved.</p>
        </div>
    </div>

    <!-- script -->
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- wow animation -->
    <script>
        $(function() {
            new WOW().init();
        });
    </script>
    <!-- end wow animation -->
</body>

</html> 