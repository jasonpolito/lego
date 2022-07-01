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
                <div class="p-4 shadow-xl sm:p-6 md:p-8 {{ settings('rounded') }}">
                    @livewire('user-form', ['form' => $form])
                </div>
            </x-col>
        </x-cols>
        @else
        <div class="text-center" style="font-family: monospace">Select a form.</div>
        @endif

    </x-container>
</x-section>