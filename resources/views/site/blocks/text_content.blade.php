@php
use App\Http\Controllers\PageController;
$html = PageController::parseTextContent($block->input('content'));
@endphp
<x-section>
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
