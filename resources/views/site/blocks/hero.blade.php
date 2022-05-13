@php
$theme_name = env('THEME_NAME');
$has_image = !Str::contains($block->image('flexible', 'flexible'), 'data:image');
@endphp
@if (View::exists("themes.$theme_name.hero"))
@include("themes.$theme_name.hero", ['block' => $block])
@else
<x-section data-jarallax data-speed="0.8"
    class="jarallax {{ $block->input('fullscreen') ? 'min-h-screen flex flex-col justify-center' : '' }} bg-cover bg-center text-white text-{{ $block->input('align') }}"
    style="background-image: url({{ $block->image('flexible', 'flexible') }})">
    <div class="rounded-md opacity-50 fill-parent bg-canvas"></div>
    <x-container>
        <x-cols class="justify-{{ $block->input('align') }} py-8">
            <x-col class="w-full lg:w-3/5">
                @if ($block->input('btn_show'))
                <div class="pt-8"></div>
                @endif
                @include('site.blocks.defaults.title', ['block' => $block])
                @if (!empty($block->input('content')))
                <div class="content">
                    {!! $block->input('content') !!}
                </div>
                @endif
                @if ($block->input('btn_show'))
                @php
                $styles = [
                'default' => 'text-white bg-primary',
                'outlined' => 'border border-white text-white',
                ];
                @endphp
                <div class="flex flex-wrap items-center -mx-3 justify-{{ $block->input('align') }}">
                    @foreach ($block->children as $btn)
                    <div class="w-full px-3 my-2 sm:w-auto">
                        <a class="{{ $styles[$btn->input('btn_style') ?? 'default'] }} block rounded-md px-6 py-4 text-center sm:inline-block"
                            href="{{ $btn->input('btn_url') ?? '#' }}" @if ($btn->input('btn_external')) target="_blank"
                            @endif>
                            {!! $btn->input('btn_text') ?? 'Learn more' !!}
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif