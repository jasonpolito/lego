@php
$project = \Str::slug(env("APP_NAME"), '_');
$path = "img/icons/$project";
@endphp
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset("$path/apple-touch-icon.png") }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset("$path/favicon-32x32.png") }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("$path/favicon-16x16.png") }}">
<link rel="manifest" href="{{ asset("$path/site.webmanifest") }}">
<link rel="mask-icon" color="#5bbad5" href="{{ asset("$path/safari-pinned-tab.svg") }}">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">