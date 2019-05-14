<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD Operations</title>

    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <!-- 404 page style -->
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 520px;
            width: 100%;
            text-align: center;
            line-height: 1.4;
        }

        .notfound .notfound-404 {
            height: 190px;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 146px;
            font-weight: 700;
            margin: 0px;
            color: #232323;
        }

        .notfound .notfound-404 h1>span {
            display: inline-block;
            width: 120px;
            height: 120px;
            background-image: url({{url('/images/emoji.png')}});
            background-size: cover;
            -webkit-transform: scale(1.4);
            -ms-transform: scale(1.4);
            transform: scale(1.4);
            z-index: -1;
        }

        .notfound h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            color: #232323;
        }

        .notfound p {
            font-family: 'Montserrat', sans-serif;
            color: #787878;
            font-weight: 300;
        }

        .notfound a {
            font-family: 'Montserrat', sans-serif;
            display: inline-block;
            padding: 12px 30px;
            font-weight: 700;
            background-color: #f99827;
            color: #fff;
            border-radius: 40px;
            text-decoration: none;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .notfound a:hover {
            opacity: 0.8;
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 115px;
            }
            .notfound .notfound-404 h1 {
                font-size: 86px;
            }
            .notfound .notfound-404 h1>span {
                width: 86px;
                height: 86px;
            }
        }
    </style>

    <!-- jQuery Date-picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</head>
<body>
<br><br>
@yield('content')
</body>
</html>
