@php
use App\Http\Controllers\PageController;
$theme_name = env('THEME_NAME');
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
$reversed = $block->input('align') !== 'left';
$checklist = get_block_children($block->children, 'checklist_item');
$img = fallback_img($block->image('flexible', 'flexible'));
$id = $block->input('block_id') ?? Str::slug($block->input('title_text'));
@endphp
@if (View::exists("themes.$theme_name.sidebyside"))
@include("themes.$theme_name.sidebyside", ['block' => $block])
@else
<x-section class="side-by-side" id="{{ $id }}">
    <x-container>
        <x-cols class="{{ !$reversed ? 'flex-row-reverse' : '' }}">
            <x-col class="w-full lg:w-1/2">
                @if ($block->input('link_image'))
                @php
                $external = $block->input('img_external');
                @endphp
                <a href="{{ $block->input('img_url') }}" @if ($external) target="_blank" @endif
                    class="lg:hidden block group overflow-hidden bg-canvas {{ settings('rounded') }}">
                    <img src="{{ $img }}" class="transition duration-300 transform group-hover:scale-110">
                </a>
                <div class="hidden lg:block h-full {{ !$reversed ? 'lg:pl-8 xl:pl-14' : 'lg:pr-8 xl:pr-14' }}">
                    <a href="{{ $block->input('img_url') }}" @if ($external) target="_blank" @endif
                        class="block h-full group overflow-hidden bg-canvas {{ settings('rounded') }}">
                        <div class="fill-parent">
                            <img src="{{ $img }}"
                                class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110">
                        </div>
                    </a>
                </div>
                @else
                <div class="lg:hidden block overflow-hidden bg-canvas {{ settings('rounded') }}">
                    <img src="{{ $img }}">
                </div>
                <div class="hidden lg:block h-full {{ !$reversed ? 'lg:pl-8 xl:pl-14' : 'lg:pr-8 xl:pr-14' }}">
                    <div class="block h-full overflow-hidden bg-canvas {{ settings('rounded') }}">
                        <div class="fill-parent">
                            <img src="{{ $img }}" class="object-cover w-full h-full">
                        </div>
                    </div>
                </div>
                @endif
            </x-col>
            <x-col class="w-full py-12 lg:w-1/2">
                <x-title display="{{ $block->input('title_display_element') ?? 'h2' }}"
                    el="{{ $block->input('title_element') ?? 'h3' }}">
                    {!! $block->input('title_text') ?? $rand_title !!}
                </x-title>
                @if (!empty($block->input('content')))
                @php
                $content = PageController::parseTextContent($block->input('content'));
                // $content = PageController::parseLists($block->input('content'));
                // $content = PageController::parseLinks($content);
                // $content = Str::replace('list-decimal', 'list-disc mt-8 ', $content);

                @endphp
                <div class="mb-10 leading-6 show-rhythm content">
                    {!! $content !!}
                </div>
                @endif

                @if ($block->input('checklist_show'))
                <x-cols class="-mt-2 text-sm leading-6 sm:-mt-0">
                    @foreach ($checklist as $item)
                    @php
                    $content = PageController::parseTextContent($item->input('checklist_text'));
                    $content = Str::replace('text-base', 'text-sm', $content);
                    @endphp
                    <x-col class="w-full sm:w-1/2">
                        <div class="flex mb-4 -ml-1 sm:ml-0 sm:mb-8 show-rhythm">
                            <div class="pr-3 text-primary">
                                @if (!empty($item->input('custom_icon')))
                                @include('site.blocks.icons.' . $item->input('custom_icon'))
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                @endif
                            </div>
                            <div class="">
                                {!! $content !!}
                            </div>
                        </div>
                    </x-col>
                    @endforeach
                </x-cols>
                @endif
                @include('site.blocks.defaults.buttons', ['buttons' => $block->children()->orderBy('position')->get()])
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif