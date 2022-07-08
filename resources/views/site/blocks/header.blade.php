@php
use App\Http\Controllers\PageController;
use App\Models\Partial;

// $footer_copy = PageController::parseTextContent($block->input('footer_copy'));
$theme_name = env('THEME_NAME');
$themes = [
'default' => '',
'dark' => 'bg-canvas text-white'
];
@endphp
@if (View::exists("themes.$theme_name.header"))
@include("themes.$theme_name.header", ['block' => $block])
@else
<header class="z-50 bg-white top-0 sticky md:relative shadow {{ $themes[$block->input('theme')] }}"
    x-data="{activeMenu: null}">
    @if ($block->input('show_topbar'))
    <div class="py-4 text-xs">
        <div class="bg-black fill-parent opacity-10"></div>
        <x-container>
            <div class="flex justify-end">
                <div>{!! $block->input('topbar_content') !!}</div>
            </div>
        </x-container>
    </div>

    @endif
    <div>
        <x-container>
            <div class="flex items-center justify-between">
                <a class="block py-4" href="/">
                    <img src="{{ $block->image('flexible', 'flexible', ['fm' => null]) }}"
                        style="{{ $block->input('logo_style') }}" alt="">
                </a>
                <ul class="items-center hidden h-full -mr-6 xl:flex">
                    @foreach ($block->children()->orderBy('position')->get() as $link)
                    @php
                    $link_id = Str::slug($link->input('text'), '_');
                    $has_megamenu = $link->input('has_megamenu');
                    @endphp
                    <li class="h-full group">
                        <a href="{!! $link->input('url') !!}" @mouseover="activeMenu = '{{ $link_id }}'"
                            @focus="activeMenu = '{{ $link_id }}'" x-ref="{{ $link_id }}"
                            class="block h-full p-6 transition hover:opacity-80">{!!
                            $link->input('text') !!}
                            @if ($has_megamenu)
                            <div class="absolute left-0 z-50 w-full h-8 top-full"></div>

                            @endif
                        </a>
                        @if ($link->children()->count())
                        <ul
                            class="absolute pb-4 text-sm transition rounded shadow-2xl opacity-0 pointer-events-none group-hover:pointer-events-auto group-hover:opacity-100 top-full whitespace-nowrap bg-canvas">
                            @foreach ($link->children()->orderBy('position')->get() as $link)
                            <li>
                                <a href="{!! $link->input('url') !!}"
                                    class="block px-6 py-2 transition hover:opacity-80">{!! $link->input('text')
                                    !!}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <ul class="flex items-center -mr-6 xl:hidden" x-data="{menuOpen: false}">
                    <li>
                        <a href="#" class="block p-6" @click.prevent="menuOpen = !menuOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </a>
                        <ul class="absolute right-0 pb-6 mr-2 transition transform -translate-y-4 bg-white rounded-lg shadow-xl opacity-0 pointer-events-none top-full"
                            :class="{'pointer-events-auto opacity-100 translate-y-0': menuOpen, 'pointer-events-none opacity-0 -translate-y-4': !menuOpen}">
                            @foreach ($block->children()->orderBy('position')->get() as $link)
                            <li>
                                <a href="{!! $link->input('url') !!}" class="block px-8 py-4 group whitespace-nowrap">
                                    <div class="transition opacity-0 fill-parent bg-canvas group-hover:opacity-10">
                                    </div>
                                    {!!
                                    $link->input('text') !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </x-container>
    </div>
    @foreach ($block->children()->orderBy('position')->get() as $link)
    @if ($link->input('has_megamenu'))
    @php
    $link_id = Str::slug($link->input('text'), '_');
    $partial = Partial::find($link->input('partial'));
    @endphp
    <div class="absolute z-50 w-full transition opacity-0 pointer-events-none top-full"
        @mouseover="activeMenu = '{{ $link_id }}'" @mouseout="activeMenu = null"
        :class="{'pointer-events-none opacity-0': activeMenu != '{{ $link_id }}', 'pointer-events-auto opacity-100': activeMenu == '{{ $link_id }}'}">
        {!! $partial->renderBlocks() !!}</div>
    @endif
    @endforeach
    @endif
</header>