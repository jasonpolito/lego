@php
$theme_name = env('THEME_NAME');
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
$reversed = $block->input('align') !== 'left';
$checklist = get_block_children($block->children, 'checklist_item');
$img = fallback_img($block->image('flexible', 'flexible'));
@endphp
@if (View::exists("themes.$theme_name.sidebyside"))
@include("themes.$theme_name.sidebyside", ['block' => $block])
@else
<x-section class="side-by-side">
    <x-container>
        <x-cols class="{{ $reversed ? 'flex-row-reverse' : '' }}">
            <x-col class="w-full lg:w-1/2">
                <a href="#" class="lg:hidden block group overflow-hidden bg-canvas {{ settings('rounded') }}">
                    <img src="{{ $img }}" class="transition duration-300 transform group-hover:scale-110">
                </a>
                <div class="hidden lg:block h-full {{ $reversed ? 'lg:pl-8 xl:pl-14' : 'lg:pr-8 xl:pr-14' }}">
                    <a href="#" class="block h-full group overflow-hidden bg-canvas {{ settings('rounded') }}">
                        <div class="fill-parent">
                            <img src="{{ $img }}"
                                class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110">
                        </div>
                    </a>
                </div>
            </x-col>
            <x-col class="w-full py-12 lg:w-1/2">
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
                <x-cols class="-mt-2 text-sm leading-6 sm:-mt-0">
                    @foreach ($checklist as $item)
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
                    @endforeach
                </x-cols>
                @endif
                @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif