@php
use App\Http\Controllers\PageController;
$html = PageController::parseTextContent($block->input('content'));
$id = $block->input('block_id') ?? uniqid();
@endphp
<x-section id="{{ $id }}">
    <div class="border-t border-b opacity-50 fill-parent border-canvas-content"></div>

    <x-container>
        <x-cols class="justify-{{ $block->input('align') }}">
            <x-col class="w-full lg:w-2/3">
                <div class="content">
                    {!! $html !!}
                </div>
            </x-col>
        </x-cols>
    </x-container>
</x-section>