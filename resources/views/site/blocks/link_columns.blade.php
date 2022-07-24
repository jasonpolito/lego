@php
use App\Http\Controllers\PageController;
$theme_name = env('THEME_NAME');
$columns = get_block_children($block->children, 'link_column');
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.link_columns"))
@include("themes.$theme_name.link_columns", ['block' => $block])
@else
<div class="md:w-auto"></div>
<x-section id="{{ $id }}" class="text-sm text-white bg-canvas">
    <x-container>
        @if ($block->input('is_narrow'))
        <div class="-my-8 md:-my-20">
            @endif
            <x-cols class="justify-evenly">
                @foreach ($columns as $col)
                @php
                $links = get_block_children($col->children, 'link_item');
                @endphp
                <x-col class="w-1/2 my-8 md:w-auto">
                    <ul class="leading-6 content">
                        <h5 class="mb-2 leading-6 show-rhythm">{!! $col->input('title_text') !!}</h5>
                        @foreach ($links as $link)
                        <li class="text-canvas-50">
                            <span class=" hover:text-white focus:text-white">
                                <a @if ($link->input('external'))
                                    target="_blank"

                                    @endif href="{!! $link->input('url') ?? '#' !!}">{!!
                                    $link->input('text') !!}</a>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </x-col>
                @endforeach
            </x-cols>
            @if ($block->input('is_narrow'))
        </div>
        @endif
    </x-container>
</x-section>
@endif