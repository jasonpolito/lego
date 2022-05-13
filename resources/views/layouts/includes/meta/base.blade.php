@php

// Analytics

// Meta includes
$includes = [
    'info',
    'favicons', //
    'stylesheets',
];
@endphp

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@foreach ($includes as $inc)
    @include("layouts.includes.meta.$inc", ['page_data' => $page_data ?? []])
@endforeach
