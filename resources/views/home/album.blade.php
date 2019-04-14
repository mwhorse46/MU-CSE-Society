<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Gallery </title>

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

    <!-- lightbox gallery -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.min.css') }}">
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
</head>

<body>
    <div class="nav-bar-master">
        <div class="left-side">
            <a href="/home"> Home </a>
        </div>

        <div class="middle-side">
            Gallery
        </div>
    </div>

    <div class="content" style="position:absolute; top:55px">
        <div class="gallery-header">
            <a href="/home"><u>Back</u></a> &nbsp; :: &nbsp; <u>Album</u>&nbsp;->&nbsp;<u>{{ $albumName }}</u>
        </div>

        <div class="sub-content">
            <div class="row-flex" style="justify-content: left;">
                @foreach($photos as $photo)
                <div class="column-album-wrapper wow flipInX">
                    <div class="column-album">
                        <a href="{{ asset('images/'.$photo->image) }}" data-lightbox="album" title="{{ $photo->caption }}">
                            <img src="{{ asset('images/'.$photo->image) }}" alt="{{ $photo->caption }}">
                        </a>
                        <div class="img-caption" style="border: none">{{ $photo->caption }}</div>
                    </div>
                </div>
                @endforeach
            </div>
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