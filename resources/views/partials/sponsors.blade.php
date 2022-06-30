@php
$sections = [
[
'title' => 'Co-Hosted By:',
'items' => [
["co-hosts/palm-coast-logo.png", "16rem"],
["co-hosts/Florida-Humanities-Logo-400-x-200.webp", "12rem"],
["co-hosts/FL-Blue-Logo.svg", "11rem"],
["co-hosts/Flagler-logo.png", "8rem"],
["co-hosts/evolve2.webp", "12rem"],
["co-hosts/culture-builds-FL-logo.webp", "12rem"],
]
],
[
'title' => 'Opening Gala Sponsors:',
'items' => [
["opening-gala-sponsors/paul-renner-logo.png", "14rem"],
["opening-gala-sponsors/advent.svg", "15rem"],
]
],
[
'title' => 'Youth Forum Sponsors:',
'items' => [
["youth-forum-sponsors/quantum-tires-logo.png", "10rem"],
["youth-forum-sponsors/parent.png", "13rem"],
["youth-forum-sponsors/halifax-health-logo.webp", "8rem"],
["youth-forum-sponsors/logo-black.png", "15rem"],
]
]
];
// dd($co_hosts);
@endphp
<x-section>
    <x-container>
        <div class="mb-16 text-center"><img src="{{ asset("img/sponsors/Water-Ways.webp") }}?c=1" style="width: 20rem"
                class="mx-auto mb-16">
        </div>

        @foreach ($sections as $section)
        @if (!$loop->first)
        <div class="flex justify-center py-8 mb-16">
            <div class="w-1/3">
                <div class="border-t border-canvas-content"></div>
            </div>
        </div>

        @endif
        <x-title el="h5" class="text-center">{{ $section['title'] }}</x-title>
        <div class="flex flex-wrap items-center justify-center mb-16 -mx-6">
            @foreach ($section['items'] as $item)
            <div class="my-4">
                <div class="px-6">
                    <img src="{{ asset("img/sponsors/$item[0]") }}?c=1" style="width: {{ $item[1] }}" alt="">
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </x-container>
</x-section>