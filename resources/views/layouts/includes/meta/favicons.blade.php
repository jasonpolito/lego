@php
use App\Models\Variable;

$dir = \Str::slug(Variable::where('search', 'company_name')->first() ? Variable::where('search',
'company_name')->first()->replace : (env('COMPANY_NAME') ?? " "), '_');
$path = "img/icons/$dir";
@endphp
<link rel="apple-touch-icon" sizes="180x180"
    href="{{ file_exists(asset("$path/apple-touch-icon.png")) ? asset("$path/apple-touch-icon.png") : asset("img/$dir/apply-touch-icon.png") }}">
<link rel="icon" type="image/png" sizes="32x32"
    href="{{ file_exists(asset("$path/favicon-32x32.png")) ? asset("$path/favicon-32x32.png") : asset("img/$dir/favicon-32x32.png") }}">
<link rel="icon" type="image/png" sizes="16x16"
    href="{{ file_exists(asset("$path/favicon-16x16.png")) ? asset("$path/favicon-16x16.png") : asset("img/$dir/favicon-16x16.png") }}">
<link rel="manifest" href="{{ asset("$path/site.webmanifest") }}">
<link rel="mask-icon" color="#5bbad5" href="{{ asset("$path/safari-pinned-tab.svg") }}">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">