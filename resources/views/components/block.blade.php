@php
$theme_name = env('THEME_NAME');
$block_name = $attributes->get('name');
@endphp
@if (View::exists("themes.$theme_name.$block_name"))
    @include("themes.$theme_name.$block_name")
@else
    {!! $slot !!}
@endif
