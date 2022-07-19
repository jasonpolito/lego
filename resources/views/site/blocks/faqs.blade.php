@php
$theme_name = env('THEME_NAME');
$padding = "sm:px-6 sm:py-6 md:px-8 px-4 py-4 lg:px-12";
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.faqs"))
@include("themes.$theme_name.faqs", ['block' => $block])
@else
<div x-data="{selected:null}" id="{{ $id }}">
    <div class="border-t border-b opacity-50 fill-parent border-canvas-50"></div>
    <x-section class="faqs">
        <x-container>
            <div class="pb-8 sm:text-center sm:pb-16">@include('site.blocks.defaults.title', ['block' => $block])</div>
            <x-cols class="justify-center">
                <x-col class="w-full lg:w-2/3">
                    <ul class="-mx-4 leading-6 sm:mx-0">
                        @foreach ($block->children()->orderBy('position')->get() as $faq)
                        <li class="overflow-hidden sm:mb-4 group">
                            <div class="border-t opacity-25 sm:border sm:rounded fill-parent border-canvas-100"></div>
                            <button class="block w-full text-lg text-left transition appearance-none {{ $padding }}"
                                :class="{'text-primary': selected == {{ $loop->index }}}"
                                @click="selected !== {{ $loop->index }} ? selected = {{ $loop->index }} : selected = null">
                                <div class="flex">
                                    <div class="w-full">
                                        <x-title el="h5">{!! $faq->input('faq_title') !!}</x-title>
                                    </div>
                                    <div class="pt-1 pl-4">
                                        <div class="transition-all duration-700 opacity-25 group-hover:opacity-100"
                                            :class="{'rotate-180 opacity-100': selected === {{ $loop->index }}}">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all duration-700 max-h-0" style=""
                                x-ref="container{{ $loop->index }}"
                                x-bind:style="selected == {{ $loop->index }} ? 'max-height: ' + $refs.container{{ $loop->index }}.scrollHeight + 'px' : ''">
                                <div class="transition duration-700 {{ $padding }}" style="padding-top: 0"
                                    :class="{'translate-y-4 opacity-0': selected !== {{ $loop->index }}}">
                                    <div class="pb-8">
                                        {!!
                                        $faq->input('faq_content') !!}
                                        <div class="pt-4">@include('site.blocks.defaults.buttons', ['buttons' =>
                                            $faq->children])</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </x-col>
            </x-cols>
        </x-container>
    </x-section>
</div>
@endif