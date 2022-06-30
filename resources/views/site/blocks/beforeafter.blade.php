@php
$section_id = $block->input('section_id') ?? uniqid();
@endphp
<x-section id="{{ $section_id }}">
    <div class="cover bg-canvas-100 opacity-10"></div>
    <x-container>
        <div class="pb-8 sm:text-center sm:pb-16">@include('site.blocks.defaults.title', ['block' => $block])</div>
        <x-cols>
            @foreach ($block->children()->orderBy('position')->get() as $item)
            <x-col class="w-full md:w-1/2 xl:w-1/3">
                @php
                $id = uniqid();
                @endphp
                <div x-data="{width: 50}" class="mb-8 rounded-lg shadow-lg group">
                    <img src="{{ $item->image('flexible2', 'flexible2') }}" alt="{{ $item->imageAltText('flexible2') }}"
                        class="w-full rounded-lg">
                    <div
                        class="absolute transition-all duration-300 opacity-0 group-hover:scale-100 scale-75 transform group-hover:opacity-50 bottom-0 right-0 m-4 text-xs uppercase bg-canvas text-white pointer-events-none py-1 px-3 tracking-widest font-bold {{ settings('rounded') }}">
                        After</div>
                    <div class="overflow-hidden rounded-lg fill-parent">
                        <div class="overflow-hidden bg-cover shadow-2xl fill-parent"
                            x-bind:style="{'width': width + '%'}"
                            style="width:50%; background-image: url({{ $item->image('flexible', 'flexible') }})">
                            <div
                                class="absolute transition-all duration-300 opacity-0 group-hover:scale-100 scale-75 transform group-hover:opacity-50 bottom-0 left-0 m-4 text-xs uppercase bg-canvas text-white pointer-events-none py-1 px-3 tracking-widest font-bold {{ settings('rounded') }}">
                                Before</div>
                        </div>
                    </div>
                    <div class="flex justify-end fill-parent" style="width: 100%;"
                        x-bind:style="{'width': width + '%'}">
                        <div class="w-2 h-full bg-white shadow-2xl cursor-pointer">
                            <div class="fill-parent">
                                <div class="w-8 h-8 -m-4 bg-white rounded-full" style="top: 50%; left: 50%">
                                    <div class="flex flex-col justify-center fill-parent">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 transform scale-90 rotate-90" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input x-model="width" type="range" min="2" max="99"
                        class="bg-transparent appearance-none cursor-pointer slider-ctrl fill-parent">

                </div>
                @if (!empty($item->input('text')))
                <div class="pt-2 text-center">{!! $item->input('text') !!}</div>

                @endif
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>

<style>
    .slider-ctrl::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 0;
        height: 0;
    }

    .slider-ctrl::-moz-range-thumb {
        appearance: none;
        cursor: pointer;
        width: 0;
        height: 0;
    }
</style>