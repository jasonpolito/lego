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
<header class="sticky top-0 z-50 w-full bg-white shadow xl:relative" x-data="{activeMenu: null}">
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
                    $has_megamenu = $link->input('has_megamenu');
                    @endphp
                    <li class="h-full group">
                        <a href="{!! link_url($link) !!}" @mouseover="activeMenu = '{{ $link_id }}'"
                            @focus="activeMenu = '{{ $link_id }}'" x-ref="{{ $link_id }}"
                            class="block h-full p-6 transition hover:opacity-80">{!!
                            link_text($link) !!}
                            @if ($has_megamenu)
                            <div class="absolute left-0 z-50 w-full h-8 top-full"></div>

                            @endif
                        </a>
                        @if ($link->children()->count())
                        <ul
                            class="absolute pb-4 text-sm transition bg-white rounded shadow-2xl opacity-0 pointer-events-none group-hover:pointer-events-auto group-hover:opacity-100 top-full whitespace-nowrap">
                            @foreach ($link->children()->orderBy('position')->get() as $link)
                            <li>
                                <a style="min-width: 10rem" href="{!! link_url($link) !!}"
                                    class="block px-6 py-2 pr-8 transition hover:opacity-80">{!! link_text($link)
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
                        <ul class="absolute right-0 pb-6 mr-2 transition duration-300 transform -translate-y-8 bg-white rounded-lg shadow-xl opacity-0 pointer-events-none translat top-full"
                            :class="{'pointer-events-auto opacity-100 translate-y-0': menuOpen, 'pointer-events-none opacity-0 -translate-y-4': !menuOpen}">
                            @foreach ($block->children()->orderBy('position')->get() as $link)
                            <li>
                                <a style="min-width: 12rem" href="{!! $link->input('url') !!}"
                                    class="block px-8 py-4 group whitespace-nowrap">
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

    @if (auth('twill_users')->user())
    <div class="absolute top-0 right-0 p-2">
        <a href="/admin/partials/{{ $partial->id }}/edit" style="z-index: 999; border: solid 1px rgba(255,255,255,.5)"
            target="_blank"
            class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg> Partial
        </a>
    </div>
    @endif
</header>