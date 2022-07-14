@php
$uniqid = uniqid();
@endphp
{{-- <div class="pb-16 sm:pb-20 lg:pb-24 xl:pb-28"></div> --}}
<section data-id="{{ $uniqid }}" {{ $attributes }} style="{{ $attributes->get('style') }}" @if ($id) id="{!! $id !!}"
    @endif class="{{ $class }} py-12 sm:py-16 md:py-24 xl:py-32">
    @if ($attributes->get('reduced-padding') == true)
    <div class="-my-8 md:-my-20">{{ $slot }}</div>
    @else
    {{ $slot }}
    @endif
</section>