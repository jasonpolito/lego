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
            <x-col class="w-full sm:w-2/3 lg:w-1/2">
                <div class="p-4 shadow-xl sm:p-6 md:p-8 {{ settings('rounded') }}">
                    @livewire('user-form', ['form' => $form])
                    @if (auth('twill_users')->user())
                    <div class="absolute top-0 right-0 p-2">
                        <a href="/admin/forms/{{ $form->id }}/edit"
                            style="z-index: 999; border: solid 1px rgba(255,255,255,.5)" target="_blank"
                            class="flex flex-col items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
                            Edit Form
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