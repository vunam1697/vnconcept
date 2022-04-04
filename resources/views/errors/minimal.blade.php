<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- <link rel="shortcut icon" href="{{ url('/').getOptions('general', 'favicon') }}"> -->
        <link rel="icon" , href="{{ url('/').getOptions('general', 'favicon') }}" , type="image/x-icon" , sizes="16x16" />

        <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/pages/page-404.css">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                /* color: #636b6f; */
                /* font-family: 'montserrat__regular';
                font-weight: 100;
                height: 100vh;
                margin: 0; */
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body class="font-sans">
        @yield('main')
    </body>
</html>
