<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

			<!-- Google adsense -->
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7874408220628358" crossorigin="anonymous"></script>
		<meta name="google-adsense-account" content="ca-pub-7874408220628358">

			<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-9WVHE3NW91"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-9WVHE3NW91');
		</script>

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

		@livewireStyles
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> {{-- Bootstrap MODAL + Menu--}}
		{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
		<link rel="stylesheet" href="{{url('css/MyStrap.css')}}" />
		<link rel="stylesheet" href="{{url('css/stilka18.css')}}" />
		<link rel="stylesheet" href="{{url('css/store.css')}}" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> {{-- Bi Bi --}}
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> {{-- Fa Fa --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"> {{-- Fancybox --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=B612:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> {{-- B612 Prices --}}
		<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;700;900&display=swap" rel="stylesheet"> {{-- Numbers --}}
	</head>

	<body>

		@yield('app')

		@livewireScripts
		<script src="{{url('js/skripts.js')}}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> {{-- Bootstrap MODAL + Menu--}}
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.0/dist/jquery.min.js"></script> {{-- Fancybox --}}
		<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> {{-- Fancybox --}}
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>