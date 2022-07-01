@php
$id = $block->input("block_id") ?? uniqid();
@endphp
<x-section id="{{ $id }}">
    <div class="border-t opacity-50 fill-parent border-canvas-content"></div>
    <x-container>
        @if (!empty($block->input('title_text')))
        <div class="mb-8 text-center">@include('site.blocks.defaults.title', ['block' => $block])</div>
        @endif
        <div class="gap-4 lg:gap-8 columns-2 lg:columns-3">
            @foreach ($block->imagesAsArrays('flexible', 'flexible') as $img)
            <div class="w-full mb-4 lg:mb-8">
                <div>
                    <img class="w-full {{ settings('rounded') }}" src="{{ $img['src'] }}" alt="{{ $img['alt'] }}">
                    <div
                        class="border pointer-events-none fill-parent opacity-50 border-canvas-content {{ settings('rounded') }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </x-container>
</x-section>