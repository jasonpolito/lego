@php
use App\Http\Controllers\PageController;
$html = PageController::parseTextContent($block->input('content'));
@endphp
<x-block-section :block="$block">
    <x-cols class="justify-{{ $block->input('align') }}">
        <x-col class="w-full lg:w-2/3">
            <div class="content">
                {!! $html !!}
            </div>
        </x-col>
    </x-cols>
</x-block-section>