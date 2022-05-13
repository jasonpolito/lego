@php
$theme_name = env('THEME_NAME');
@endphp
@if (View::exists("themes.$theme_name.cards"))
@include("themes.$theme_name.cards", ['block' => $block])
@else
<div class="md:w-1/2"></div>
<x-section>
	<div class="fill-parent bg-canvas opacity-5"></div>
	<x-container>
		<div class="text-center lg:text-left">
			@include('site.blocks.defaults.title', ['block' => $block])
			<div></div>
		</div>
		<x-cols class="justify-center md:-mx-4">
			@foreach ($block->children as $card)
			<x-col class="flex justify-center w-full md:px-4 lg:w-1/2">
				<div
					class="w-full {{ $card->input('card_cover') ? 'text-white' : '' }} bg-white max-w-lg my-4 {{ settings('rounded') }} lg:max-w-none">
					<div class="overflow-hidden {{ settings('rounded') }}">
						<div class="h-56 overflow-hidden rounded-t-md xl:h-80">
							<div class="fill-parent"><img src="{{ $card->image('flexible', 'flexible') }}"
									class="object-cover w-full h-full" alt=""></div>
						</div>
						@if ($card->input('card_cover'))
						<div class="bg-center bg-cover fill-parent"
							style="background-image: url({{ $card->image('flexible', 'flexible') }})"></div>
						<div class="opacity-75 fill-parent bg-primary"></div>
						@endif
						<div class="px-5 py-4 sm:p-6 md:p-8">
							<div class="pt-2">
								<x-title el="h4">{!! $card->input('card_title') !!}</x-title>
								<div></div>
							</div>
							<div class="mb-2 -mt-2 md:-mt-4">
								<p class="leading-6 sm:leading-8">{!! $card->input('card_content') !!}</p>
							</div>
							@include('site.blocks.defaults.buttons', ['buttons' => $block->children])
						</div>
					</div>
				</div>
			</x-col>
			@endforeach
		</x-cols>
	</x-container>
</x-section>
@endif