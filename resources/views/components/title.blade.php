@php
$classes = config('styles.typography');
$css = $classes[$display ?? $el];
@endphp
<{{ $el }} {{ $attributes->class(['font-title show-rhythm ', $css]) }}>
    <div class="{{ $class }}">{{ $slot }}</div>
    </{{ $el }}>
