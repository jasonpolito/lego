@php
use App\Models\Page;
$theme_name = env('THEME_NAME');
$limit = $block->input('limit') !== 'all' ? $block->input('limit') : -1;
$current_post = Page::published()->get()->filter(function($item) {
return $item->nestedSlug == request()->path();
})->first();
$exclude = $current_post ? [$current_post->id] : [];
$posts = Page::withTag([$block->input('tags')])->orderBy('position',
'asc')->published()->whereNotIn('id', $exclude)->limit($limit)->get();
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.posts"))
@include("themes.$theme_name.posts", ['block' => $block])
@else
@if ($block->input('tags'))
@if (count($posts))
<x-section id="{{ $id }}" :reduced-padding="$block->input('reduced_padding')">
    {{-- <div class="border-t border-b opacity-25 fill-parent border-canvas-50"></div> --}}
    <div class="fill-parent bg-canvas opacity-5"></div>
    <x-container>
        <div class="text-center">
            @include('site.blocks.defaults.title', ['block' => $block])
            <div></div>
        </div>
        <x-cols class="justify-center">
            @foreach ($posts as $post)
            @php
            $url = route('page.show', ['slug' => $post->nestedSlug])
            @endphp
            <x-col class="flex justify-center w-full lg:w-1/2">
                <div class="w-full bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
                    <div class="overflow-hidden {{ settings('rounded') }}">
                        <a href="{{ $url }}"
                            class="block h-56 overflow-hidden rounded-t-md xl:h-80 group bg-gradient-to-br from-primary to-primary-900">
                            <div class="fill-parent"><img src="{{ $post->image('flexible', 'flexible') }}"
                                    class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
                                    alt="{{ $post->imageAltText('flexible') }}">
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
                                <div class="text-sm leading-6 show-rhythm opacity-80">{!! $post->excerpt ??
                                    \Str::limit($post->content, 100, '(...)') !!}</div>
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
@else

<x-section class="text-red-800 bg-red-100">
    <x-container class="text-center">
        <div class="text-center" style="font-family: monospace">Select a page tag.</div>
    </x-container>
</x-section>
@endif
@endif