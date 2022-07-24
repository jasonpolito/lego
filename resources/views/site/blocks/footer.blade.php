@php
use App\Http\Controllers\PageController;
$footer_copy = PageController::parseTextContent($block->input('footer_copy'));
$footer_copy = Str::replace('text-base', 'text-sm', $footer_copy);
$theme_name = env('THEME_NAME');
$page = get_post();
$cols = get_block_children($block->children, 'footer_column');
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.footer"))
@include("themes.$theme_name.footer", ['block' => $block])
@else
<footer id="{{ $id }}">
    <x-section class="flex-1 text-sm text-white font-content bg-canvas">
        <x-container>
            {{-- <div class="w-full md:pb-8 md:-mt-8">
                <div class="border-t opacity-50 fill-parent border-canvas-mid"></div>
            </div> --}}
            <x-cols class="justify-between">
                @if (!Str::contains($block->image('flexible', 'flexible'), 'data:image') || !empty($footer_copy))
                <x-col class="w-full my-8 lg:w-1/3 text-canvas-50">
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
                <x-col class="w-1/2 my-8 sm:w-1/3 lg:w-auto">
                    <div>
                        <div class="md:w-1/3"></div>
                        <h5 class="mb-2 leading-6 show-rhythm">{!! $col->input('title') !!}</h5>
                    </div>
                    <ul class="leading-6 content show-rhythm">
                        @foreach ($links as $link)
                        <li class="text-canvas-50">
                            @if ($link->input('is_title'))
                            <span class="opacity-50">{!!
                                $link->input('text') !!}</span>
                            @else
                            <span class="">
                                <a class="group" href="{!! link_url($link) !!}"><span
                                        class="text-canvas-50 group-hover:text-white group-focus:text-white">
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
                @php
                $socials = get_block_children($block->children, 'social_item');
                $socials = $socials->filter(function($item) {
                return $item->input('icon') != null;
                });
                @endphp
                @if (count($socials))
                <x-col class="w-1/2 my-8 sm:w-1/3 lg:w-auto">
                    <div>
                        <h5 class="mb-2 leading-6 show-rhythm">Social</h5>
                    </div>
                    <ul class="flex items-center -mx-2 show-rhythm">
                        @php
                        @endphp
                        @foreach ($socials as $link)
                        @php
                        $partial = 'partials.socialicons.' . Str::lower($link->input("icon"))
                        @endphp
                        @if (View::exists($partial))
                        <li class="px-2 text-canvas-50">
                            <a href="{{ $link->input('url') }}" target="_blank" class="transition hover:text-white">
                                @include($partial)
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
    <div class="pt-8 pb-16 text-xs bg-canvas text-canvas-200">
        <x-container>
            <div class="flex">
                <ul class="flex flex-wrap items-center my-4 -mx-2">
                    <li class="w-full px-2 sm:w-auto">{!! PageController::parsePHP($block->input('legal_copy')) !!}</li>
                    <li class="w-full pt-4 sm:hidden"></li>
                    @foreach (get_block_children($block->children, 'link_item') as $link)
                    <li class="px-2 opacity-75 {{ $loop->first }} hidden sm:block">|</li>
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