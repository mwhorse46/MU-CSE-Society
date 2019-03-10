<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('page-title') </title>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- style datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed|Open+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700">
</head>

<body>
    <div class="nav-bar-master">
        <div class="left-side">
            <a href="{{ URL::previous() }}"> &lArr; Back </a>
        </div>

        <div class="middle-side">
            @yield('dashboard-name')
        </div>

        <div class="right-side">
            <a> {{ Auth::user()->name }} </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <img src="{{ asset('img/logout.png') }}" class="icon-logout">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    @yield('content')


    <!-- script -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- script datepicker -->
    <script type="text/javascript" src="{{ asset('jquery-ui/external/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $('#date').datepicker({
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            autoclose: true
        });
    </script>
    <!-- end script datepickr -->
</body>

</html> 