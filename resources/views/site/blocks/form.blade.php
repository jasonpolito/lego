@php
use App\Models\Form;
$form = Form::withTrashed()->find($block->input('form_id'));
$id = $block->input('block_id') ?? uniqid();
@endphp

<x-section id="{{ $id }}" :reduced-padding="$block->input('reduced_padding')">
    {{-- <div class="border-t border-b opacity-50 fill-parent border-canvas-50></div> --}}
    <x-container>
        @if ($form)
        <div class="lg:text-center">@include('site.blocks.defaults.title', ['block' => $block])</div>
        <x-cols class="justify-center pt-8">
            <x-col class="w-full sm:w-2/3 lg:w-1/2">
                <div class="p-4 shadow-xl sm:p-6 md:p-8 {{ settings('rounded') }}">
                    @livewire('user-form', ['form' => $form])
                    @if (auth('twill_users')->user())
                    <div class="absolute top-0 right-0 p-2">
                        <a href="/admin/forms/{{ $form->id }}/edit"
                            style="z-index: 999; border: solid 1px rgba(255,255,255,.5)" target="_blank"
                            class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg> {{ $form->title }}
                        </a>
                    </div>
                    @endif
                </div>
            </x-col>
        </x-cols>
        @else
        <div class="text-center" style="font-family: monospace">Select a form.</div>
        @endif

    </x-container>
</x-section>