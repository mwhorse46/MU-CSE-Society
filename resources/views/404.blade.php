<html lang="en">
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ERROR!!!404</title>

    <!-- fonts -->
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/404.css') }}">
</head>

<body>
    <div class="wrap">
        <div class="logo">
            <p>OOPS! - Could not Find it</p>
            <img src="{{ asset('img/404.png')}}" />
            <p>The page you are looking for might have been removed,
                <br>
                had it's name changed
                <br>
                or
                <br>
                is temporarily unavailable
            </p>

            <div class="sub">
                <p><a href="{{ route('home') }}">Back To Home</a></p>
            </div>
        </div>
    </div>
</body>

</html> 