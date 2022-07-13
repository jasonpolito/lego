@php
$id = $block->input("block_id") ?? uniqid();
@endphp
<x-section id="{{ $id }}">
    <div class="border-t opacity-50 fill-parent border-canvas-content"></div>
    <div class="px-5 mx-auto sm:px-6 md:px-10 lg:px-14 xl:container">
        @if (!empty($block->input('title_text')))
        <div class="mb-8 text-center">@include('site.blocks.defaults.title', ['block' => $block])</div>
        @endif
        <div class="gap-2 sm:gap-4 columns-2 lg:columns-3">
            @php
            $imgs = $block->imagesAsArrays('flexible', 'flexible');
            shuffle($imgs);
            @endphp
            @foreach ($imgs as $img)
            <div class="w-full mb-2 sm:mb-4">
                <div class="bg-canvas-content {{ settings('rounded') }}"
                    style="padding-top: {{ $img['height'] / $img['width'] * 100 }}%">
                    <img data-zoomable class="fill-parent {{ settings('rounded') }}" src="{{ $img['src'] }}"
                        alt="{{ $img['alt'] }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-section>