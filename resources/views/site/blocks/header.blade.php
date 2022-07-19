@php
use App\Http\Controllers\PageController;
use App\Models\Partial;
$partial = Partial::where('title', 'Header')->first();
$theme_name = env('THEME_NAME');
$themes = [
'default' => '',
'dark' => 'bg-canvas text-white'
];
@endphp
@if (View::exists("themes.$theme_name.header"))
@include("themes.$theme_name.header", ['block' => $block])
@else
<header class="sticky top-0 z-50 w-full text-white shadow bg-canvas xl:relative" x-data="{activeMenu: null}">
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
                        style="{{ $block->input('logo_style') }}" alt="{{ $block->imageAltText('flexible') }}">
                </a>
                <ul class="items-center hidden h-full -mr-6 xl:flex">
                    @foreach ($block->children()->orderBy('position')->get() as $link)
                    @php
                    $link_id = Str::slug($link->input('text'), '_');
                    $active = active_link($link);
                    $has_megamenu = $link->input('has_megamenu');
                    @endphp
                    <li class="h-full group">
                        <a href="{!! link_url($link) !!}" @mouseover="activeMenu = '{{ $link_id }}'"
                            @focus="activeMenu = '{{ $link_id }}'" x-ref="{{ $link_id }}"
                            class="block h-full p-6 transition hover:text-primary-50 {{ $active ? 'text-primary-50 hover:opacity-75' : '' }}">{!!
                            link_text($link) !!}
                            @if ($active)
                            <div
                                class="absolute bottom-0 w-3 h-1 mb-3 transition duration-300 transform -translate-x-1/2 rounded-full group-hover:scale-x-150 bg-primary-50 left-1/2">
                            </div>

                            @endif
                            @if ($has_megamenu)
                            <div class="absolute left-0 z-50 w-full h-8 top-full"></div>

                            @endif
                        </a>
                        @if ($link->children()->count())
                        <ul
                            class="absolute py-2 text-sm text-white transition duration-300 -translate-y-8 border rounded shadow-2xl opacity-0 pointer-events-none bg-canvas group-hover:translate-y-0 border-canvas-800 group-hover:pointer-events-auto group-hover:opacity-100 top-full whitespace-nowrap">
                            @foreach ($link->children()->orderBy('position')->get() as $link)
                            @php
                            $active = active_link($link);
                            @endphp

                            <li>
                                <a style="min-width: 10rem" href="{!! link_url($link) !!}"
                                    class="block group px-6 py-2 pr-8 transition hover:text-primary-50 {{ $active ? 'text-primary-50' : '' }}">

                                    <div class="peer fill-parent"></div>
                                    <div
                                        class="transition opacity-{{ $active ? '5' : '0' }} pointer-events-none fill-parent bg-primary peer-hover:opacity-10">
                                    </div>
                                    @if ($active)
                                    <div
                                        class="absolute left-0 w-1 h-1 ml-3 transition duration-300 transform -translate-y-1/2 rounded-full peer-hover:scale-150 top-1/2 bg-primary">
                                    </div>
                                    @endif
                                    {!! link_text($link) !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <ul class="flex items-center -mr-4 sm:-mr-6 xl:hidden" x-data="{menuOpen: false}">
                    <li>
                        <a href="#" class="block p-6 transition opacity-50 hover:text-primary hover:opacity-100"
                            @click.prevent="menuOpen = !menuOpen">
                            <div class="w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    :class="{'opacity-0 -rotate-90': menuOpen, 'opacity-100 -rotate-0': !menuOpen}"
                                    class="w-8 h-8 transition duration-300 transform fill-parent" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    :class="{'opacity-100 rotate-0': menuOpen, 'opacity-0 rotate-90': !menuOpen}"
                                    class="w-8 h-8 transition duration-300 transform opacity-0 fill-parent" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </a>
                        <ul class="absolute right-0 py-2 mr-4 -mt-2 transition duration-300 transform -translate-y-8 bg-white border rounded-lg shadow-xl opacity-0 pointer-events-none border-canvas-800 sm:mr-6 translat top-full"
                            :class="{'pointer-events-auto opacity-100 translate-y-0': menuOpen, 'pointer-events-none opacity-0 -translate-y-4': !menuOpen}">
                            <li @click.outside="menuOpen = false" x-show="menuOpen" class="fill-parent"></li>
                            @foreach ($block->children()->orderBy('position')->get() as $link)
                            @php
                            $active = active_link($link);
                            @endphp
                            <li>
                                <a style="min-width: 12rem" href="{!! link_url($link) !!}"
                                    class="block px-8 py-3 transition group whitespace-nowrap hover:text-primary {{ $active ? 'text-primary-50' : '' }}">
                                    <div
                                        class="transition opacity-{{ $active ? '5' : '0' }} fill-parent bg-primary-50 group-hover:opacity-10 group-focus:opacity-10">
                                    </div>
                                    @if ($active)
                                    <div
                                        class="absolute left-0 w-2 h-2 ml-3 transition transform -translate-y-1/2 rounded-full top-1/2 bg-primary-50">
                                    </div>

                                    @endif
                                    {!!
                                    link_text($link) !!}
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

    @if (auth('twill_users')->user())
    <div class="absolute top-0 right-0 p-2">
        <a href="/admin/partials/{{ $partial->id }}/edit" style="z-index: 999; border: solid 1px rgba(255,255,255,.5)"
            target="_blank"
            class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg> {{ $partial->title }}
        </a>
    </div>
    @endif
</header>