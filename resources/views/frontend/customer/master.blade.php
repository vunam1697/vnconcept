<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title position-relativele>@yield('title')</title position-relativele>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" , content="index, follow">
    <link rel="icon" , href="images/icons/favicon-16x16.svg" , type="image/x-icon" , sizes="16x16" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/tool.css">

     <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/main.css">

	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/custom.css">

</head>

<body class="">
    <div class="wrapper">

        @yield('main')

    </div>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/jquery.js"></script>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/slick.js"></script>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/tab.js"></script>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/main.js"></script>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/toastr.min.js"></script>

    <script src="{{ __BASE_URL__ }}/js/plugins/jquery-custome-select.js"></script>

    <script type="text/javascript" src="{{ __BASE_URL__ }}/js/customer.js"></script>

    <script>
        $(document).ready(function() {
            $('.menuAdmin').on("click", function() {
                $('.page__admin').toggleClass('active');
            })
        })
    </script>

    @yield('script')

    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>

    @if(Session::has('message'))
        <script type='text/javascript'>
         $(document).ready(function(){
            toastr["{!! Session::get('level') !!}"]("{!! Session::get('message') !!}")
        });
        </script>
    @endif
</body>

</html>
