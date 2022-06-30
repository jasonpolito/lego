@php
use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;

$alpha = 'abcdefghijklmnopqrstuvwxyz';
$nums = '1234567890(,.;:?!$&*)';
$primary = app(SettingRepository::class)->byKey('main_color_sdgagasdag');
$secondary = app(SettingRepository::class)->byKey('secondary_color_sdgagasdag');
$canvas = app(SettingRepository::class)->byKey('canvas_color_sdgagasdag');
$colors = [
[$primary, 'Primary'],
[$secondary, 'Secondary'],
[$canvas, 'Canvas'],
];
$page_data = [
'meta_title' => 'Style Guide | AACS'
]
@endphp
@extends('layouts.default')
@section('content')

<x-section>
    <div class="px-8 md:px-16">
        <x-cols class="justify-center">
            <x-col class="w-full md:w-1/2">
                <x-title el="h3">Logo</x-title>
                <img src="{{ asset('img/logo2.png') }}" alt="" class="mb-6">
                <ul class="mb-12 text-xs leading-6 opacity-50">
                    <li class="flex items-center">Red, green, and yellow UNIA flag colors</li>
                    <li class="flex items-center">Growth and rebirth motifs <i>(foral, butterfly)</i></li>
                    <li class="flex items-center">Connected pieces representing community</li>
                </ul>
                <x-title el="h3">Colors</x-title>
                <x-cols class="mb-16">
                    @foreach ($colors as $color)
                    <x-col class="mb-6">
                        <div class="w-40 h-40 mb-4 rounded" style="background: {{ $color[0] }}"></div>
                        <div class="pb-2">{{ $color[1] }}</div>
                        <ul class="text-xs leading-6 opacity-50">
                            <li class="flex items-center">
                                <div class="w-12">HEX:</div>
                                <div>{{ $color[0] }}</div>
                            </li>
                            <li class="flex items-center">
                                <div class="w-12">RGB:</div>
                                <div>{{ (new Hex($color[0]))->toRgb() }}</div>
                            </li>
                            <li class="flex items-center">
                                <div class="w-12">HSL:</div>
                                <div>{{ (new Hex($color[0]))->toHsl() }}</div>
                            </li>
                        </ul>
                    </x-col>

                    @endforeach
                </x-cols>
                <x-title el="h3">Typography</x-title>
                <div class="mb-8 -mt-4 md:-mt-6"><a class="opacity-50 hover:underline"
                        href="https://fonts.google.com/specimen/Inter" target="_blank">Download Font
                        Family</a></div>
                <div class="flex w-full mb-8 leading-8 items-strech">
                    <div class="flex flex-col justify-center pr-8 border-r border-canvas-100">
                        <div>Inter</div>
                        <div class="text-xs opacity-50 whitespace-nowrap">Weight: 900</div>
                    </div>
                    <div class="flex items-center w-full pl-8 font-bold">
                        <div class="w-40 py-4 text-center text-8xl">Aa</div>
                        <div class="w-full pl-8 text-xl">
                            <div>{!! Str::upper($alpha) !!}</div>
                            <div>{!! $alpha !!}</div>
                            <div>{!! $nums !!}</div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full mb-8 leading-8 items-strech ">
                    <div class="flex flex-col justify-center pr-8 border-r border-canvas-100">
                        <div>Inter</div>
                        <div class="text-xs opacity-50 whitespace-nowrap">Weight: 500</div>
                    </div>
                    <div class="flex items-center w-full pl-8">
                        <div class="w-40 py-4 text-center text-8xl">Aa</div>
                        <div class="w-full pl-8 text-xl">
                            <div>{!! Str::upper($alpha) !!}</div>
                            <div>{!! $alpha !!}</div>
                            <div>{!! $nums !!}</div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full mb-8 leading-8 items-strech">
                    <div class="flex flex-col justify-center pr-8 border-r border-canvas-100">
                        <div>Inter</div>
                        <div class="text-xs opacity-50 whitespace-nowrap">Weight: 100</div>
                    </div>
                    <div class="flex items-center w-full pl-8 font-thin">
                        <div class="w-40 py-4 text-center text-8xl">Aa</div>
                        <div class="w-full pl-8 text-xl">
                            <div>{!! Str::upper($alpha) !!}</div>
                            <div>{!! $alpha !!}</div>
                            <div>{!! $nums !!}</div>
                        </div>
                    </div>
                </div>
            </x-col>
        </x-cols>
    </div>
</x-section>

@endsection