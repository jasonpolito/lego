@php
$block=$attributes->get('block');
$id = $block->input("block_id") ?? uniqid();
@endphp
<x-section id="{{ $id }}" :reduced-padding="$block->input('reduced_padding')"
    class="{{ $block->input('fullscreen') ? 'md:min-h-screen flex flex-col justify-center' : '' }} bg-cover bg-center text-white text-{{ $block->input('align') }}">
    <x-container>
        {{ $slot }}
    </x-container>
</x-section>