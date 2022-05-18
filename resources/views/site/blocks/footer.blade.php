@php
$theme_name = env('THEME_NAME');
$cols = get_block_children($block->children, 'footer_column');
@endphp
@if (View::exists("themes.$theme_name.footer"))
@include("themes.$theme_name.footer", ['block' => $block])
@else
<footer>
    <x-section class="flex-1 text-sm font-light text-white bg-canvas">
        <x-container>
            <x-cols class="justify-between">
                @foreach ($cols as $col)
                <x-col class="w-1/2 md:w-1/{{ $cols->count() / 2 }} xl:w-auto my-8">
                    <div>
                        <div class="md:w-1/3"></div>
                        <h5 class="mb-2 leading-6 show-rhythm">{!! $col->input('title') !!}</h5>
                    </div>
                    <ul class="leading-6 content show-rhythm">
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
</footer>
@endif