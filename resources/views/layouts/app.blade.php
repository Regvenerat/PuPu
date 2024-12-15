<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<title> @yield('title') </title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<meta name="application-name" content="Mozogeo">
		<meta name="description" content="ყველა აქცია ერთ საიტზე">
		<meta name="keywords" content="Promos, Markets, აქციები, ფასდაკლებები, mozo, სუპერმარკეტები, იაფი, იაფად">
		<meta name="author" content="Pink">
			{{-- Share --}}
		<meta property="og:description" content="@yield('ogdescription')" data-rh="true">
		<meta property="og:title" content="@yield('ogtitle')" data-rh="true">
		<meta property="og:image" content="@yield('ogimage')" data-rh="true">
		<meta property="og:type" content="website" data-rh="true">
		<meta property="og:url" content="@yield('ogurl')" data-rh="true">
		<meta property="og:site_name" content="Mozo.Ge" data-rh="true">
		{{-- <meta property="fb:app_id" content="666" data-rh="true"> --}}

		<link rel="shortcut icon" href="@yield('ikonka')" type="image/x-icon"> {{--Favicon--}}
		{{-- <link rel="icon" href="{{url('img/logo1.png')}}"> Larg Icon --}}

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{url('css/app.css')}}" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet"> {{--მაინ--}}
		<link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@0;1&display=swap" rel="stylesheet"> {{--ლინკ--}}
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@100..900&display=swap" rel="stylesheet"> {{--ქართული--}}

	</head>

	<body>



		@yield('app')


		{{-- <script src="{{url('js/skripts.js')}}"></script> --}}
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	</body>
</html>