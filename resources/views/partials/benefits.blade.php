@php
$items = [
"Educates and interprets our rich African American culture.",
"Promotes pride and demonstrates our relevance in the community.",
"Is an extended family to explore new ventures and develop hidden talents.",
"Affords us a monument for those who come after us to value and build upon.",
"Is a repository to preserve our history of African American accomplishments.",
"Evidences our concern for our youth by offering training, programs, and relevant activities.",
"Provides exciting experiences with study groups, lectures, cultural trips, and social events.",
"Perpetuates our culture through exhibitions and the presentation of visual and performing arts.",
"Owns the beautiful facility that houses our Cultural Center and Museum along with five surrounding acres.",
];
@endphp

<x-section class="bg-canvas text-canvas-content">
    {{-- <div class="bg-center bg-cover fill-parent jarallax" data-jarallax data-speed="0.8"
        style="position: absolute; background-image: url({{ asset('img/colline_s_kitchen.webp') }})">
    </div> --}}
    <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" class="jarallax" data-jarallax
        data-speed="0.5">
        <img class="jarallax-img" src="{{ asset('img/colline_s_kitchen.webp') }}">
    </div>
    <x-container>
        <x-title el="h3" display="h2" class="text-center">Membership Benefits</x-title>
        <ul class="flex flex-wrap items-stretch pt-8 -mx-4 leading-8">
            @foreach ($items as $item)
            <li class="px-4 mb-8 md:w-1/2 lg:w-1/3">
                <div class="h-full p-8 transition rounded bg-canvas hover:text-white">{{ $item }}</div>
            </li>
            @endforeach
        </ul>

        <div class="flex justify-center pt-8">
            <div class="w-full px-3 sm:w-auto">
                <a class="block px-6 py-4 my-2 text-center text-white transition rounded-md group sm:inline-block bg-primary hover:bg-primary-600"
                    href="#">
                    Join Now
                </a>
            </div>
        </div>
    </x-container>
</x-section>