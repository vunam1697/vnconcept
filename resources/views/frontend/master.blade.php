<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	{{-- <link rel="shortcut icon" href="{{ url('/').$site_info->favicon }}", type="image/x-icon" , sizes="16x16"> --}}
	@if (isset($site_info->index_google))
		<meta name="robots" content="{{ $site_info->index_google == 1 ? 'index, follow' : 'noindex, nofollow' }}">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
	{!! SEO::generate() !!}
	<meta name='revisit-after' content='1 days' />
	<meta name="copyright" content="GCO" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Hà Nội" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta name="_token" content="{{csrf_token()}}" />
 	<link rel="canonical" href="{{ \Request::fullUrl() }}">

	 <!--link css-->

	 <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

	 <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/tool.css">

     <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/main.css">

	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/custom.css">

    @yield('css')

</head>
	<body>
        <input type="hidden" name="base_url" value="{{url('/')}}">

		<div class="loadingcover" style="display: none;">
			<p class="csslder">
				<span class="csswrap">
					<span class="cssdot"></span>
					<span class="cssdot"></span>
					<span class="cssdot"></span>
				</span>
			</p>
		</div>

        <div class="wrapper">

		@include('frontend.teamplate.header')

        <main id="main">
            <div class="container__wrapper">
			@yield('main')
            </div>
        </main>

        </div>

        @include('frontend.teamplate.footer')

		<!--Link js-->

        <script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/jquery.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/slick.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/plugins/tab.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/main.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/toastr.min.js"></script>

        <script type="text/javascript" src="{{ __BASE_URL__ }}/js/customer.js"></script>

		@yield('script')
        <script type="text/javascript">
            const loading = '<img src="{{ __BASE_URL__ }}/images/icons/loading.gif" />';
        </script>
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
