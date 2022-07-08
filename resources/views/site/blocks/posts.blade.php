@php
$theme_name = env('THEME_NAME');
$query = \App\Models\Page::posts();
if ($block->input('limit')) {
$query->limit($block->input("limit"));
}
$current_slug = request()->path();
$query->whereHas('slugs', function ($q) use($current_slug) {
$q->where('slug', '!=', $current_slug);
});
$posts = $query->get();
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.cards"))
@include("themes.$theme_name.cards", ['block' => $block])
@else
<div class="md:w-1/2"></div>
<x-section id="{{ $id }}">
    <div class="fill-parent bg-canvas opacity-5"></div>
    <x-container>
        <div class="text-center lg:text-left">
            @include('site.blocks.defaults.title', ['block' => $block])
            <div></div>
        </div>
        <x-cols class="justify-center md:-mx-4">
            @foreach ($posts as $post)
            @php
            $url = route('page.show', ['slug' => $post->nestedSlug])
            @endphp
            <x-col class="flex justify-center w-full md:px-4 lg:w-1/2 xl:w-1/3">
                <div class="w-full bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
                    <div class="overflow-hidden {{ settings('rounded') }}">
                        <a href="{{ $url }}" class="block h-56 overflow-hidden rounded-t-md xl:h-80 group">
                            <div class="fill-parent"><img src=""
                                    class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
                                    alt="">
                            </div>
                        </a>
                        <div class="px-5 py-4 sm:p-6 md:p-8">
                            <div class="pt-2">
                                <a href="{{ $url }}">@include('site.blocks.defaults.title',
                                    ['block' => $post])
                                    <span></span>
                                </a>
                                <div></div>
                            </div>
                            <div class="mb-4 -mt-2 md:-mt-4">
                                <p class="leading-6 show-rhythm opacity-80">{!! $post->title !!}</p>
                            </div>
                            {{-- @include('site.blocks.defaults.buttons', ['buttons' => $card->children]) --}}
                        </div>
                    </div>
                </div>
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>
@endif