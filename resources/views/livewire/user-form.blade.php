<div x-data>
    <form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
        @csrf
        @foreach ($form->blocks as $block)
        @php
        $multi = $block->input('allow_multiple');
        $name = Str::slug($block->input('name'), '_');
        $input_id = $name . ($multi ? '[]' : '');
        @endphp
        <label for="{{ $input_id }}" class="block mb-4">
            <div class="text-sm leading-8">{{ $block->input('name') }}</div>
            @if ($block->input('type') == 'text')
            <div class="-my-px">
                <input id="{{ $input_id }}" wire:model.defer="{{ $name }}" name="{{ $name }}"
                    class="block w-full py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                    type="{{ $block->input('text_type') ?? 'text' }}" @if ($block->input('text_type') == 'tel')
                x-mask="(999) 999-9999"

                @endif
                placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}">
            </div>
            @endif
            @if ($block->input('type') == 'textarea')
            <div class="-my-px">
                <textarea id="{{ $input_id }}" wire:model.defer="{{ $name }}" name="{{ $name }}"
                    class="block w-full py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                    placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}"></textarea>
            </div>
            @endif
            @if ($block->input('type') == 'options')
            @if ($block->input('options_type') == 'select')
            <div class="-my-px">
                <select id="{{ $id }}" multiple wire:model.defer="{{ $name }}" name="{{ $name }}"
                    class="block w-full appearance-none py-2 px-4 text-base leading-10 group border border-canvas-content focus:border-primary {{ settings('rounded') }}"
                    placeholder="{{ $block->input('placeholder') ?? $block->input('name') }}">
                    @foreach ($block->children()->orderBy('position')->get() as $opt)
                    <option value="{{ $opt->input('text') }}">{{ $opt->input('text') }}</option>
                    @endforeach
                </select>
                <div class="absolute top-0 right-0 px-4 py-4 leading-10 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                </div>
            </div>
            @endif
            @if ($block->input('options_type') == 'checkbox')
            @foreach ($block->children()->orderBy('position')->get() as $opt)
            @php
            $opt_id = Str::slug($opt->input('text'), '_');
            @endphp
            @if ($multi)
            <div class="flex">
                <label for="{{ $opt_id }}" class="flex items-center pb-2 transition cursor-pointer hover:text-primary">
                    <input type="checkbox" value="{{ $opt->input('text') }}" wire:model.defer="{{ $name }}"
                        name="{{ $name }}" id="{{ $opt_id }}">
                    <span class="pl-3">{{ $opt->input('text') }}</span>
                </label>
            </div>
            @else
            <div class="flex">
                <label for="{{ $input_id }}"
                    class="flex items-center pb-2 transition cursor-pointer hover:text-primary">
                    <input type="radio" wire:model.defer="{{ $name }}" name="{{ $name }}" id="{{ $opt_id }}">
                    <span class="pl-3">{{ $opt->input('text') }}</span>
                </label>
            </div>
            @endif
            @endforeach
            @endif
            @endif
        </label>
        @error($name)
        <div class="-mt-4 text-sm leading-8" style="color: #cc1d00">{{ $message }}</div>
        @enderror
        @endforeach

        <div class="flex md:justify-center">
            <div class="w-full lg:w-auto">
                <button wire:loading.class="opacity-50" class="w-full group {{ config('styles.btns')['default'] }}">
                    <span wire:loading.class="hidden">{{ $form->submit_text ?? 'Send message' }}</span>
                    <span wire:loading style="display: none">Submitting...</span>
                </button>
            </div>
        </div>
        @if ($errors->any())
        <div class="text-sm leading-8 text-center" style="color: #cc1d00">
            Please fix any form errors.
        </div>
        @endif
    </form>
</div>