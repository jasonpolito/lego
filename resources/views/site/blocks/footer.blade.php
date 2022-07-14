@php
use App\Http\Controllers\PageController;
$footer_copy = PageController::parseTextContent($block->input('footer_copy'));
$footer_copy = Str::replace('text-base', 'text-sm', $footer_copy);
$theme_name = env('THEME_NAME');
$cols = get_block_children($block->children, 'footer_column');
$id = $block->input('block_id') ?? uniqid();
$social_links = [
'facebook',
'instagram',
'twitter',
'youtube',
'linkedin',
];
$has_social = false;
foreach ($social_links as $name) {
if (!empty($block->input($name . '_link'))) {
$has_social = true;
}
}
@endphp
@if (View::exists("themes.$theme_name.footer"))
@include("themes.$theme_name.footer", ['block' => $block])
@else
<footer id="{{ $id }}">
    <x-section class="flex-1 text-sm text-white font-content bg-canvas">
        <x-container>
            <div class="w-full md:pb-8 md:-mt-8">
                <div class="border-t opacity-50 fill-parent border-canvas-mid"></div>
            </div>
            <x-cols class="justify-between">
                @if (!Str::contains($block->image('flexible', 'flexible'), 'data:image') || !empty($footer_copy))
                <x-col class="w-full my-8 md:w-1/3 text-canvas-content">
                    @if (!Str::contains($block->image('flexible', 'flexible'), 'data:image'))
                    <a class="block mb-8" href="/">
                        <img src="{{ $block->image('flexible', 'flexible', ['fm' => null]) }}"
                            style="{{ $block->input('logo_style') }}" alt="{{ $block->imageAltText('flexible') }}">
                    </a>
                    @endif
                    @if (!empty($footer_copy))
                    {!! $footer_copy !!}
                    @endif
                </x-col>
                @endif
                @foreach ($cols as $col)
                @php
                $links = get_block_children($col->children, 'link_item');
                $btns = get_block_children($col->children, 'button');
                @endphp
                <x-col class="w-1/2 md:w-1/{{ $cols->count() / 2 }} xl:w-auto my-8">
                    <div>
                        <div class="md:w-1/3"></div>
                        <h5 class="mb-2 leading-6 show-rhythm">{!! $col->input('title') !!}</h5>
                    </div>
                    <ul class="leading-6 content show-rhythm">
                        @foreach ($links as $link)
                        <li class="text-canvas-content">
                            @if ($link->input('is_title'))
                            <span class="opacity-50">{!!
                                $link->input('text') !!}</span>
                            @else
                            <span class="">
                                <a class="group" href="{!! link_url($link) !!}"><span
                                        class="text-canvas-content group-hover:text-white group-focus:text-white">
                                        {!!
                                        $link->input('text') !!}
                                    </span></a>
                            </span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @if ($btns->count())
                    @include('site.blocks.defaults.buttons', ['buttons' => $btns])
                    @endif
                </x-col>
                @endforeach
                @if ($has_social)
                <x-col class="w-full my-8 md:w-1/3 text-canvas-content">
                    <ul class="flex -mx-2">
                        @foreach ($social_links as $link)
                        @if (!empty($block->input($link . '_link')))
                        <li class="px-2">
                            <a class="block mb-2" target="_blank" href="{{ $block->input($link . '_link') }}">
                                @include('partials.socialicons.' . $link)
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </x-col>
                @endif
            </x-cols>
        </x-container>
    </x-section>
    <div class="pt-8 pb-16 text-xs bg-canvas text-canvas-mid">
        <x-container>
            <div class="flex">
                <ul class="flex items-center my-4 -mx-2">
                    <li class="px-2">{!! PageController::parsePHP($block->input('legal_copy')) !!}</li>
                    @foreach (get_block_children($block->children, 'link_item') as $link)
                    <li class="px-2 opacity-75">|</li>
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