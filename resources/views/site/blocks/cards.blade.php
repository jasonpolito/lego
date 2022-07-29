@php
use App\Models\Page;

$theme_name = env('THEME_NAME');
$sections = get_block_children($block->children, 'card_section');
$limit = $block->input('limit') !== 'all' ? $block->input('limit') : -1;

$current_page = get_post();

$exclude = $current_page ? [$current_page->id] : [];

$pages = Page::withTag($block->input('tags'))->orderBy('position',
'asc')->published()->whereNotIn('id', $exclude)->limit($limit)->get();

$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.cards"))
@include("themes.$theme_name.cards", ['block' => $block])
@else
@if ($block->children()->count() || count($pages))
<x-section id="{{ $id }}">
	<div class="fill-parent bg-canvas opacity-5"></div>
	<x-container>
		@if ($block->input('use_pages'))
		@if (!empty($block->input('title_text')))
		<div class="text-center lg:text-left">
			@include('site.blocks.defaults.title', ['block' => $block])
			<div></div>
		</div>
		@endif
		<x-cols class="justify-center md:-mx-4">
			@foreach ($pages as $page)
			@php
			$img = $page->image('flexible', 'flexible');
			@endphp

			@if (
			$block->input('variant') == 'default' ||
			empty($block->input('variant'))
			)
			<x-col class="flex justify-center w-full md:px-4 lg:w-1/2">
				<div class="flex flex-col w-full bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
					<a href="{{ route('page.show', ['slug' => $page->nestedSlug]) }}" class="block h-56 overflow-hidden
						rounded-t{{ Str::replace('rounded-', '', settings('rounded')) }} xl:h-80 group">
						<div class="fill-parent"><img src="{{ $img }}"
								class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
								alt="{{ $page->imageAltText('flexible') }}">
						</div>
					</a>
					<div class="flex flex-col flex-1 px-5 py-4 sm:p-6 md:p-8">
						<div class="w-full h-full">
							<div class="pt-2">
								<a href="{{ route('page.show', ['slug' => $page->nestedSlug]) }}">@include('site.blocks.defaults.title',
									['block' => $page])
									<span></span>
								</a>
								<div></div>
							</div>
							<div class="mb-4 -mt-2 md:-mt-4">
								<p class="leading-6 show-rhythm opacity-80">{!! $page->excerpt !!}</p>
							</div>
						</div>
						{{-- <div>
							@include('site.blocks.defaults.buttons', ['buttons' =>
							$card->children()->orderBy('position')->get(), 'align' =>
							$card->input('align_buttons')])
						</div> --}}
					</div>
				</div>
			</x-col>
			@endif
			@if (
			$block->input('variant') == 'stacked' ||
			$block->input('variant') == 'stacked_reversed'
			)
			<x-col class="flex justify-center w-full max-w-3xl md:px-4">
				<div
					class="flex flex-wrap w-full {{ $block->input('variant') == 'stacked_reversed' ? 'flex-row-reverse' : '' }} bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
					<a href="{{ route('page.show', ['slug' => $page->nestedSlug]) }}"
						class="block h-56 w-full sm:w-1/3 sm:h-auto overflow-hidden
							sm:rounded-tl-none sm:rounded-r-{{ Str::replace('rounded-', '', settings('rounded')) }} rounded-t-{{ Str::replace('rounded-', '', settings('rounded')) }} group">
						<div class="fill-parent"><img src="{{ $img }}"
								class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
								alt="{{ $page->imageAltText('flexible') }}">
						</div>
					</a>
					<div class="flex flex-col flex-1 px-5 py-4 sm:p-6 md:p-8">
						<div class="w-full h-full">
							<div class="pt-2">
								<a href="{{ route('page.show', ['slug' => $page->nestedSlug]) }}">@include('site.blocks.defaults.title',
									['block' => $page])
									<span></span>
								</a>
								<div></div>
							</div>
							<div class="mb-4 -mt-2 md:-mt-4">
								<p class="leading-6 show-rhythm opacity-80">{!! $page->excerpt !!}</p>
							</div>
						</div>
						{{-- <div>
								@include('site.blocks.defaults.buttons', ['buttons' =>
								$card->children()->orderBy('position')->get(), 'align' =>
								$card->input('align_buttons')])
							</div> --}}
					</div>
				</div>
			</x-col>
			@endif
			@endforeach
		</x-cols>
		@else
		@foreach ($sections as $section)
		@if (!$loop->first)
		<div class="py-8"></div>

		@endif
		@if (!empty($section->input('title_text')))
		<div class="text-center lg:text-left">
			@include('site.blocks.defaults.title', ['block' => $section])
			<div></div>
		</div>
		@endif
		<x-cols class="justify-center md:-mx-4">
			@php
			$cards = get_block_children($section->children, 'card');
			@endphp
			@foreach ($cards as $card)
			@php
			$img = $card->image('flexible', 'flexible');
			@endphp
			@if ($block->input('variant') == 'default' || empty($block->input('variant')))
			<x-col class="flex justify-center w-full md:px-4 lg:w-1/2">
				@if ($card->input('is_img_card'))
				<a class="flex flex-col text-white py-8 md:py-16 justify-center items-center w-full shadow hover:shadow-2xl my-4 transition-all px-6 text-center bg-cover bg-center group {{ settings('rounded') }}"
					href="{{ link_url($card) }}" style="background-image: url({{ $img }})" @if($card->input('external'))
					target="_blank"
					@endif>
					<div class="fill-parent {{ settings('rounded') }} overflow-hidden">
						<div class="transition-all duration-500 transform bg-center bg-cover fill-parent group-hover:scale-110"
							style="background-image: url({{ $img }})"></div>
					</div>
					<div
						class="fill-parent bg-canvas opacity-50 group-hover:opacity-75 transition group-hover:bg-primary {{ settings('rounded') }}">
					</div>
					@include('site.blocks.defaults.title', ['block' => $card])
				</a>
				@else
				<div
					class="flex flex-col w-full {{ $card->input('card_cover') ? 'text-white' : '' }} bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
					@if ($card->input('url'))
					<a href="{{ link_url($card) }}" @if ($card->input('external'))
						target="_blank"
						@endif class="block sm:h-56 overflow-hidden
						rounded-t{{ Str::replace('rounded-', '', settings('rounded')) }} xl:h-80 group">
						<div class="fill-parent"><img src="{{ $img }}"
								class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
								alt="{{ $card->imageAltText('flexible') }}">
						</div>
					</a>
					@else
					<div
						class="block h-56 overflow-hidden rounded-t{{ Str::replace('rounded-', '', settings('rounded')) }} xl:h-80">
						<div class="fill-parent"><img src="{{ $img }}" class="object-cover w-full h-full"
								alt="{{ $card->imageAltText('flexible') }}">
						</div>
					</div>
					@endif
					@if ($card->input('card_cover'))
					<div class="bg-center bg-cover fill-parent" style="background-image: url({{ $img }})"></div>
					<div class="opacity-75 fill-parent bg-primary"></div>
					@endif
					<div class="flex flex-col flex-1 px-5 py-4 sm:p-6 md:p-8">
						<div class="w-full h-full">
							@if (!empty($card->input('title_text')))
							<div class="pt-2">
								@if ($card->input('url'))
								<a href="{{ $card->input('url') }}" @if ($card->input('external'))
									target="_blank"
									@endif
									>@include('site.blocks.defaults.title', ['block' => $card])
									<span></span>
								</a>
								@else
								@include('site.blocks.defaults.title', ['block' => $card])
								@endif
								<div></div>
							</div>
							@endif
							<div class="mb-4 -mt-2 md:-mt-4">
								<p class="leading-6 show-rhythm opacity-80">{!! $card->input('card_content') !!}</p>
							</div>
						</div>
						<div>
							@include('site.blocks.defaults.buttons', ['buttons' =>
							$card->children()->orderBy('position')->get(), 'align' =>
							$card->input('align_buttons')])
						</div>
					</div>
				</div>
				@endif
			</x-col>
			@endif
			@if (
			$block->input('variant') == 'stacked' ||
			$block->input('variant') == 'stacked_reversed'
			)
			<x-col class="w-full max-w-3xl md:px-4">
				<div
					class="flex flex-wrap w-full {{ $block->input('variant') == 'stacked_reversed' ? 'flex-row-reverse' : '' }} {{ $card->input('card_cover') ? 'text-white' : '' }} bg-white my-4 {{ settings('rounded') }}">
					@if ($card->input('url'))
					<a href="{{ link_url($card) }}" @if ($card->input('external'))
						target="_blank"
						@endif class="block h-56 overflow-hidden
						rounded-t{{ Str::replace('rounded-', '', settings('rounded')) }} xl:h-80 group">
						<div class="fill-parent"><img src="{{ $img }}"
								class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
								alt="{{ $card->imageAltText('flexible') }}">
						</div>
					</a>
					@else
					<div
						class="block w-full h-56 sm:h-auto sm:w-1/3 overflow-hidden rounded-t{{ Str::replace('rounded-', '', settings('rounded')) }}">
						<div class="fill-parent"><img src="{{ $img }}" class="object-cover w-full h-full"
								alt="{{ $card->imageAltText('flexible') }}">
						</div>
					</div>
					@endif
					<div class="flex flex-col flex-1 px-5 py-4 sm:p-6 md:p-8">
						<div class="w-full h-full">
							@if (!empty($card->input('title_text')))
							<div class="pt-2">
								@if ($card->input('url'))
								<a href="{{ $card->input('url') }}" @if ($card->input('external'))
									target="_blank"
									@endif
									>@include('site.blocks.defaults.title', ['block' => $card])
									<span></span>
								</a>
								@else
								@include('site.blocks.defaults.title', ['block' => $card])
								@endif
								<div></div>
							</div>
							@endif
							<div class="mb-4 -mt-2 md:-mt-4">
								<p class="leading-6 show-rhythm opacity-80">{!! $card->input('card_content') !!}</p>
							</div>
						</div>
						<div>
							@include('site.blocks.defaults.buttons', ['buttons' =>
							$card->children()->orderBy('position')->get(), 'align' =>
							$card->input('align_buttons')])
						</div>
					</div>
				</div>
			</x-col>
			@endif
			@endforeach
		</x-cols>
		@endforeach
		@endif

	</x-container>
</x-section>
@else

<x-section class="text-red-800 bg-red-100">
	<x-container class="text-center">
		<div class="text-center" style="font-family: monospace">Add some cards.</div>
	</x-container>
</x-section>
@endif

@endif