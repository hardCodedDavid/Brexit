<!doctype html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>@yield('title')</title>
		<meta name="description" content="Brexits asset management">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/main.min3661.css?v=2.0') }}">
	</head>
	<body class="o-page o-page--center">
		<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->
		<div class="o-page__card">
			@yield('content')
		</div>
		<script src="{{ asset('js/main.min3661.js?v=2.0') }}"></script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
	</body>
</html>