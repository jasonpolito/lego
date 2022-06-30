@php
// dd($block->children);
$sections = get_block_children($block->children()->orderBy('position')->get(), 'sponsor_section');
@endphp
<x-section>
    <div class="border-t opacity-50 fill-parent border-canvas-content"></div>
    <x-container>
        @include('site.blocks.defaults.title', ['block' => $block])
        @foreach ($sections as $section)
        @php
        $sponsors = get_block_children($section->children()->orderBy('position')->get(), 'sponsor_item');
        @endphp
        <div class="sponsor-section">
            @if (!$loop->first)
            <div class="flex justify-center py-8 mb-16">
                <div class="w-1/3">
                    <div class="border-t border-canvas-content"></div>
                </div>
            </div>
            @endif
            @if (!empty($section->input('title_text')))
            <div class="mb-8 text-center">@include('site.blocks.defaults.title', ['block' => $section])</div>
            @endif
            <div class="flex flex-wrap items-center justify-center mb-16 -mx-6">
                @foreach ($sponsors as $sponsor)
                <div class="my-4">
                    <div class="px-6">
                        @if (empty($sponsor->input('url')))
                        <img src="{{ $sponsor->image('flexible', 'flexible', ['fm' => null]) }}"
                            alt="{{ $sponsor->imageAltText('flexible') }}"
                            style="width: {{ $sponsor->input('width') }}rem">
                        @else
                        <a href="{{ $sponsor->input('url') }}" class="block" @if ($sponsor->input('external'))
                            target="_blank"

                            @endif
                            >
                            <img src="{{ $sponsor->image('flexible', 'flexible', ['fm' => null]) }}"
                                alt="{{ $sponsor->imageAltText('flexible') }}"
                                style="width: {{ $sponsor->input('width') }}rem">
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </x-container>
</x-section>