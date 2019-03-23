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
            <a href="#About"> About Us </a>
            <a href="#News"> News </a>
            <a href="#Events"> Events </a>
            <a href="#Gallery"> Gallery </a>
            <a href="#Committee"> Committee </a>
            <a href="#Contact"> Contact Us </a>
            <a href="{{ route('login') }}"> Admin Login </a>
        </div>
    </div>
    <a href="javascript:void(0);" class="btnOpen" onclick="openSideBar()"> &rAarr; </a>

    <div class="nav-bar" id="Nav-bar">
        <a href="#Home" style="padding-top:1vh" class="home"> <img src="{{ asset('img/logo.png') }}" alt="logo" class="icon-logo"> </a>

        <a href="#Home" class="home"> Home
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#About" class="abt"> About Us
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#News" class="nws"> News
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#Events" class="evnt"> Events
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#Gallery" class="glry"> Gallery
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#Committee" class="cmte"> Committee
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="#Contact" class="cntct"> Contact Us
            <span class="vertical-bar"> &nbsp; </span> </a>

        <a href="{{ route('login') }}"> Admin Login </a>
    </div>

    <div class="banner" id="Home">
        <img src="{{ asset('img/banner.jpg') }}" alt="banner">
        <h6 class="banner-text"> CSE SOCIETY
            <br>
            <font size="4vh" font-weight="normal"> Metropolitan University </font>
        </h6>
    </div>

    <div class="block-center position-ref content">
        <div id="News">
            <p class="heading"> News </p>
            <?php
            $cnt = 1;
            foreach ($pinned as $pinned) {
                $date = \DateTime::createFromFormat('Y-m-d', $pinned->date)->format('l, d F, Y');

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
                $date = \DateTime::createFromFormat('Y-m-d', $news->date)->format('l, d F, Y');
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
            <p class="heading"> Events </p>

            <div class="row-event">
                @foreach($newEvent as $new)
                <div class="column-event">
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
                @endforeach

                @foreach($oldEvent as $old)
                <div class="column-event">
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
                @endforeach
            </div>
        </div>

        <div id="Gallery">
            <p class="heading"> Gallery </p>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
        </div>

        <div id="Committee" class="bg-ash">
            <p class="heading"> Committee </p>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
        </div>

        <div id="About">
            <p class="heading"> About </p>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec venenatis nisi. Vivamus dolor libero, maximus eget egestas in, feugiat at odio. In vehicula lorem ut nisl laoreet, vitae facilisis libero dictum. Ut id eros nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam arcu sem, viverra eget est a, faucibus pulvinar massa. Integer sagittis finibus nisl, ut tempor tellus. Quisque vehicula justo convallis, pulvinar erat vitae, eleifend quam. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id egestas mauris. Vivamus a lorem blandit, congue risus egestas, eleifend justo. Nam ullamcorper tortor eros.

                Proin elementum vestibulum felis, quis vehicula nibh egestas non. Nullam elementum nisl nunc, nec ultrices massa tincidunt ac. Donec at libero at ipsum faucibus tincidunt. Vestibulum non consequat orci, malesuada vehicula magna. Proin eget nulla volutpat erat condimentum tempor eget id libero. Ut et pulvinar augue. Phasellus mollis libero at nulla blandit, non tincidunt tortor ultricies. Curabitur risus sem, ornare sit amet augue vel, bibendum lobortis nulla. Proin sit amet urna massa. Nullam vel mi at nisi convallis feugiat. Donec a mollis massa.</p>
        </div>

        <div id="Contact" class="bg-sky row">
            <p class="heading" style="color:white"> Contact Us </p>

            <div class="column-contact adrs">
                <h4>Address:</h4>
                <hr>
                <p>Metropolitan University, Sylhet, Bangladesh.</p>
                <p><strong>City Campus:</strong> Alhmara Shopping City, Zindabazar, Sylhet.</p>
                <p><strong>Parmanent Campus:</strong> Boteshwar, Khadim Nogor, Sylhet.</p>

                <h4>Contact No: +88-01000000000</h4>
            </div>

            <div class="column-contact msg">
                <h4>Send Message:</h4>
                <hr>
                <form action="/sendmsg" method="POST">
                    {{ csrf_field() }}
                    <table style="width: 100%">
                        <tbody style="padding:0;">
                            <tr>
                                <td class="td-left"> Name* </td>
                                <td><input type="text" name="name" required placeholder="Your name" maxlength="100"></td>
                            </tr>

                            <tr>
                                <td class="td-left"> Email* </td>
                                <td><input type="email" name="email" required placeholder="email@example.com"></td>
                            </tr>

                            <tr>
                                <td class="td-left"> Message* </td>
                                <td><textarea id="comment" name="message" required placeholder="Write your message.." maxlength="5000"></textarea></td>
                            </tr>

                            <tr>
                                <td class="td-left"><input class="btnMsg" type="submit" name="submit" value="Submit"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>

        <div class="footer bg-blue">
            <p> &copy; 2019 CSE Society, Metropolitan University All Rights Reserved.</p>
        </div>
    </div>

    <!-- script -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html> 