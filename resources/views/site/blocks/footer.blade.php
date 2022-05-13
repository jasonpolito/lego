@php
$theme_name = env('THEME_NAME');
@endphp
@if (View::exists("themes.$theme_name.footer"))
    @include("themes.$theme_name.footer", ['block' => $block])
@else
    <x-section class="flex-1 text-white bg-canvas">
        <x-container>
            <x-cols>
            </x-cols>
        </x-container>
    </x-section>
@endif
