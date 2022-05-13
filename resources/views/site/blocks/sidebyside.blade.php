@php
$theme_name = env('THEME_NAME');
$has_image = !Str::contains($block->image('flexible', 'flexible'), 'data:image');
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
$reversed = $block->input('align') !== 'left';
@endphp
@if (View::exists("themes.$theme_name.sidebyside"))
@include("themes.$theme_name.sidebyside", ['block' => $block])
@else
<x-section class="side-by-side">
    <x-container>
        <x-cols class="{{ $reversed ? 'flex-row-reverse' : '' }}">
            <x-col class="w-full lg:w-1/2">
                <img src="{{ $block->image('flexible', 'flexible') }}" class="lg:hidden {{ settings('rounded') }}">
                <div class="hidden lg:block h-full {{ $reversed ? 'lg:pl-8 xl:pl-14' : 'lg:pr-8 xl:pr-14' }}">
                    <div class="h-full overflow-hidden bg-canvas {{ settings('rounded') }}">
                        <div class="fill-parent">
                            <img src="{{ $block->image('flexible', 'flexible') }}" class="object-cover w-full h-full">
                        </div>
                    </div>
                </div>
            </x-col>
            <x-col class="w-full py-12 lg:w-1/2">
                <div class="lg:pt-8"></div>
                <x-title display="{{ $block->input('title_display_element') ?? 'h2' }}"
                    el="{{ $block->input('title_element') ?? 'h3' }}">
                    {!! $block->input('title_text') ?? $rand_title !!}
                </x-title>
                @if (!empty($block->input('content')))
                <div class="mb-10 leading-6 show-rhythm">
                    {!! $block->input('content') !!}
                </div>
                @endif

                @if ($block->input('checklist_show'))
                <x-cols class="mb-2 -mt-2 text-sm leading-6 sm:-mt-0">
                    @foreach ($block->children as $item)
                    @if ($item->input('child_type') == 'checklist_item')
                    @php
                    $rand = array_rand(array_flip(config('cms.placeholders')), 1);
                    @endphp
                    <x-col class="sm:w-1/2">
                        <div class="flex mb-4 sm:mb-8 show-rhythm">
                            <div class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" class="w-7 text-primary h-7"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg></div>
                            <div>{!! $item->input('check_text') ?? $rand !!}</div>
                        </div>
                    </x-col>
                    @endif
                    @endforeach
                </x-cols>
                @endif
                @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif