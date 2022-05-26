@php
$theme_name = env('THEME_NAME');
$id = uniqid();
$items = get_block_children($block->children, 'carousel_item');
@endphp
@if (View::exists("themes.$theme_name.carousel"))
@include("themes.$theme_name.carousel", ['block' => $block])
@else
<x-section class="bg-canvas text-canvas-content">
    <x-container>
        <x-cols>
            <x-col class="w-full lg:w-1/3">
                {{-- @include('site.blocks.defaults.title', ['block' => $block]) --}}
            </x-col>
            <x-col class="w-full lg:w-2/3">
                <div class="flex flex-wrap -mx-4">
                    @foreach ($items as $item)
                    <div class="w-full px-4 my-2 md:w-1/2">
                        <div class="p-8 bg-canvas-canvas {{ settings('rounded') }}">
                            <div class="content">{!! $item->input('content') !!}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif