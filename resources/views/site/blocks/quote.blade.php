@php
$id = $block->input('block_id') ?? uniqid();
@endphp
<x-section id="{{ $id }}">
    <div class="cover bg-canvas-100 opacity-10"></div>
    <x-container>
        <x-cols class="flex items-center justify-center">
            <x-col class="w-full lg:w-5/6">
                <div class="pt-4 pl-8 border-l border-primary-700 md:pt-8 md:pl-16">
                    <blockquote type="outline-inverted" class="{{ config('styles.typography.h3') }} mb-8 md:mb-16">
                        &ldquo;{!! $block->input('content') !!}&rdquo;
                    </blockquote>
                    <div class="flex items-center">
                        <img type="outline-inverted" src="{!! $block->image('square', 'square', ['fm' => null]) !!}"
                            alt="{{ $block->imageAltText('square') }}" class="w-24 h-24 md:h-32 md:w-32">
                        <div class="pl-4 md:pl-8" type="outline-inverted">
                            <div class="font-bold md:text-xl">{!! $block->input('name') !!}</div>
                            <div class="opacity-50">{!! $block->input('title') !!}</div>
                            @if ($block->input('cta_text'))

                            <div class="hidden pt-4 content text-primary-700 md:block"><a
                                    href="{{ $block->input('cta_url') }}" class="flex items-center">
                                    <div class="pr-2">
                                        {{ $block->input('cta_text') }}
                                    </div> <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a></div>
                            @endif
                        </div>
                    </div>
                    @if ($block->input('cta_text'))
                    <div class="inline-block pt-8 content text-primary-700 md:hidden"><a
                            href="{{ $block->input('cta_url') }}" class="flex items-center">
                            <div class="pr-2">
                                {{ $block->input('cta_text') }}
                            </div> <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a></div>
                    @endif

                </div>
            </x-col>
        </x-cols>
    </x-container>
</x-section>