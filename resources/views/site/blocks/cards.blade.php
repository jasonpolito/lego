@php
$theme_name = env('THEME_NAME');
$sections = get_block_children($block->children, 'card_section');
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.cards"))
@include("themes.$theme_name.cards", ['block' => $block])
@else
<div class="md:w-1/2"></div>
<x-section id="{{ $id }}">
	<div class="fill-parent bg-canvas opacity-5"></div>
	<x-container>
		@foreach ($sections as $section)
		@if (!$loop->first)
		<div class="py-8"></div>

		@endif
		<div class="text-center lg:text-left">
			@include('site.blocks.defaults.title', ['block' => $section])
			<div></div>
		</div>
		<x-cols class="justify-center md:-mx-4">
			@php
			$cards = get_block_children($section->children, 'card');
			@endphp
			@foreach ($cards as $card)
			@php
			$img = $card->image('flexible', 'flexible');
			@endphp
			<x-col class="flex justify-center w-full md:px-4 lg:w-1/2 xl:w-1/3">
				@if ($card->input('is_img_card'))
				<a class="flex flex-col text-white py-8 md:py-16 justify-center items-center w-full shadow hover:shadow-2xl my-4 transition-all px-6 text-center bg-cover bg-center group {{ settings('rounded') }}"
					href="{{ $card->input('url') }}" style="background-image: url({{ $img }})"
					@if($card->input('external'))
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
					class="w-full {{ $card->input('card_cover') ? 'text-white' : '' }} bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
					<div class="overflow-hidden {{ settings('rounded') }}">
						@if ($card->input('url'))
						<a href="{{ $card->input('url') }}" @if ($card->input('external'))
							target="_blank"
							@endif class="block h-56 overflow-hidden rounded-t-md xl:h-80 group">
							<div class="fill-parent"><img src="{{ $img }}"
									class="object-cover w-full h-full transition duration-300 transform group-hover:scale-110"
									alt="">
							</div>
						</a>
						@else
						<div class="block h-56 overflow-hidden rounded-t-md xl:h-80">
							<div class="fill-parent"><img src="{{ $img }}" class="object-cover w-full h-full" alt="">
							</div>
						</div>
						@endif
						@if ($card->input('card_cover'))
						<div class="bg-center bg-cover fill-parent" style="background-image: url({{ $img }})"></div>
						<div class="opacity-75 fill-parent bg-primary"></div>
						@endif
						<div class="px-5 py-4 sm:p-6 md:p-8">
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
							@include('site.blocks.defaults.buttons', ['buttons' => $card->children])
						</div>
					</div>
				</div>
				@endif
			</x-col>
			@endforeach
		</x-cols>
		@endforeach
	</x-container>
</x-section>
@endif