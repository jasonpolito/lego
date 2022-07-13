@php
$theme_name = env('THEME_NAME');
$limit = $block->input('limit') !== 'all' ? $block->input('limit') : -1;
$posts = App\Models\Page::withTag([$block->input('tags')])->limit($limit)->get();
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.posts"))
@include("themes.$theme_name.posts", ['block' => $block])
@else
@if ($block->input('tags'))

<x-section id="{{ $id }}">
    <div class="fill-parent bg-canvas opacity-5"></div>
    <x-container>
        <div class="text-center">
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
                            <div class="fill-parent"><img src="{{ $post->image('flexible', 'flexible') }}"
                                    class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
                                    alt="">
                            </div>
                        </a>
                        <div class="px-5 py-4 sm:p-6 md:p-8">
                            <div class="pt-2">
                                <a class="hover:underline" href="{{ $url }}">@include('site.blocks.defaults.title',
                                    ['block' => $post])
                                    <span></span>
                                </a>
                                <div></div>
                            </div>
                            <div class="mb-4 -mt-2 md:-mt-4">
                                <p class="leading-6 show-rhythm opacity-80">{!! $post->excerpt ??
                                    \Str::limit($post->content, 100, '(...)') !!}</p>
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
@else

<x-section class="text-red-800 bg-red-100">
    <x-container class="text-center">
        <div class="text-center" style="font-family: monospace">Select a post type.</div>
    </x-container>
</x-section>
@endif
@endif