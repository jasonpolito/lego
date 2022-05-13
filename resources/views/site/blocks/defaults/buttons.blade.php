@php
$styles = [
'default' => 'block my-2 rounded-md px-6 py-4 text-center sm:inline-block text-white
bg-primary',
'outlined' => 'block my-2 rounded-md px-6 py-4 text-center sm:inline-block border border-white
text-white',
'link' => 'text-primary font-bold inline-block mr-4',
];
@endphp
<div class="flex flex-wrap items-center -mx-3">
    @foreach ($buttons as $btn)
    @if ($btn->input('child_type') == 'button')
    <div class="w-full px-3 sm:w-auto">
        <a class="{{ $styles[$btn->input('btn_style') ?? 'default'] }}" href="{{ $btn->input('btn_url') ?? '#' }}"
            @if($btn->input('btn_external'))
            target="_blank" @endif>
            {!! $btn->input('btn_text') ?? 'Learn more' !!}
        </a>
    </div>
    @endif
    @endforeach
</div>