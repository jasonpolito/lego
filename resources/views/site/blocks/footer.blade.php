@php
$theme_name = env('THEME_NAME');
@endphp
@if (View::exists("themes.$theme_name.footer"))
@include("themes.$theme_name.footer", ['block' => $block])
@else
<x-section class="flex-1 font-light text-white bg-canvas">
    <x-container>
        <x-cols class="justify-between">
            @foreach (get_block_children($block->children, 'footer_column') as $col)
            <x-col class="w-1/2 my-8 sm:w-auto">
                <div>
                    <h5 class="mb-2 leading-6">{!! $col->input('title') !!}</h5>
                </div>
                <ul class="leading-8 content">
                    @foreach ($col->children as $link)
                    <li><span class="text-canvas-100 hover:text-white focus:text-white"><a
                                href="{!! $link->input('url') ?? '#' !!}">{!!
                                $link->input('text') !!}</a></span></li>
                    @endforeach
                </ul>
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>
<div class="pt-8 pb-16 -mt-20 text-xs bg-canvas text-canvas-100">
    <x-container>
        <x-cols class="">
            <x-col class="w-full lg:w-1/3">
                {!! $block->input('legal_copy') !!}
            </x-col>
        </x-cols>
        <div class="flex">
            <ul class="flex items-center my-4 -mx-2">
                @foreach (get_block_children($block->children, 'link_item') as $link)
                <li class="px-2"><span class="hover:text-white"><a href="{!! $link->input('url') ?? '#' !!}">{!!
                            $link->input('text')
                            !!}</a></span></li>
                @endforeach
            </ul>
        </div>
    </x-container>
</div>
@endif