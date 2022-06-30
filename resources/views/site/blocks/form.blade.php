@php
use App\Models\Form;
$form = Form::withTrashed()->find($block->input('form_id'));
$id = $block->input('block_id') ?? uniqid();
@endphp

<x-section id="{{ $id }}">
    <div class="border-t border-b opacity-50 fill-parent border-canvas-content"></div>
    <x-container>
        @if ($form)
        <div class="lg:text-center">@include('site.blocks.defaults.title', ['block' => $block])</div>
        <x-cols class="justify-center pt-8">
            <x-col class="w-full lg:w-1/2">
                <div class="p-4 shadow-xl md:p-8 {{ settings('rounded') }}">
                    @if (true)
                    @livewire('user-form', ['form' => $form])
                    @else
                    <form action="{{ route('form.submit', $form) }}" method="POST">
                        @csrf
                        @foreach ($form->blocks as $block)
                        @php
                        $multi = $block->input('allow_multiple');
                        $name = Str::slug($block->input('name'), '_');
                        $input_id = $name . ($multi ? '[]' : '');
                        @endphp
                        <label for="{{ $input_id }}" class="block mb-4">
                            <div class="leading-8">{{ $block->input('name') }}</div>
                            @if ($block->input('type') == 'text')
                            <div class="-my-px">
                                <input id="{{ $input_id }}" name="{{ $name }}"
                                    class="block w-full py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                                    type="text"
                                    placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}">
                            </div>
                            @endif
                            @if ($block->input('type') == 'textarea')
                            <div class="-my-px">
                                <textarea id="{{ $id }}" name="{{ $name }}"
                                    class="block w-full py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                                    placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}"></textarea>
                            </div>
                            @endif
                            @if ($block->input('type') == 'options')
                            @if ($block->input('options_type') == 'select')
                            <div class="-my-px">
                                <select id="{{ $id }}" multiple name="{{ $name }}"
                                    class="block w-full appearance-none py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                                    placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}">
                                    @foreach ($block->children as $opt)
                                    <option value="{{ $opt->input('text') }}">{{ $opt->input('text') }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute top-0 right-0 px-4 py-4 leading-10 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                </div>
                            </div>
                            @endif
                            @if ($block->input('options_type') == 'checkbox')
                            @foreach ($block->children as $opt)
                            @php
                            $id = Str::slug($opt->input('text'), '_');
                            @endphp
                            @if ($multi)
                            <div class="flex">
                                <label for="{{ $id }}"
                                    class="flex items-center pb-2 transition cursor-pointer hover:text-primary">
                                    <input type="checkbox" value="{{ $opt->input('text') }}" name="{{ $name }}"
                                        id="{{ $id }}">
                                    <span class="pl-3">{{ $opt->input('text') }}</span>
                                </label>
                            </div>
                            @else
                            <div class="flex">
                                <label for="{{ $id }}"
                                    class="flex items-center pb-2 transition cursor-pointer hover:text-primary">
                                    <input type="radio" name="{{ $name }}" id="{{ $id }}">
                                    <span class="pl-3">{{ $opt->input('text') }}</span>
                                </label>
                            </div>
                            @endif
                            @endforeach
                            @endif
                            @endif
                        </label>
                        @error($name)
                        <div class="leading-8" style="color: #cc1d00">{{ $message }}</div>
                        @enderror
                        @endforeach

                        <div class="flex md:justify-center">
                            <div class="w-full lg:w-auto">
                                <button class="w-full group {{ config('styles.btns')['default'] }}">
                                    Submit Message
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif

                </div>
            </x-col>
        </x-cols>
        @else
        <div class="text-center" style="font-family: monospace">Select a form.</div>
        @endif

    </x-container>
</x-section>