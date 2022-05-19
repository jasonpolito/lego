@php
$styles = [
'default' => 'block my-2 rounded-md px-6 py-4 text-center sm:inline-block text-white
bg-primary hover:bg-primary-600 transition',
'outlined' => 'block my-2 rounded-md px-6 py-4 text-center sm:inline-block text-white',
'underline' => 'hover:text-primary-600 transition text-primary font-bold inline-block mr-4 py-2',
'link' => 'text-primary inline-block mr-4',
];
@endphp
<div class="flex flex-wrap items-center -mx-3">
    @foreach ($buttons as $btn)
    @if ($btn->input('child_type') == 'button')
    <div class="w-full px-3 sm:w-auto">
        <a class="group {{ $styles[$btn->input('btn_style') ?? 'default'] }}" href="{{ $btn->input('btn_url') ?? '#' }}"
            @if($btn->input('btn_style') == 'underline')
            style="box-shadow: 0 .125rem;"
            @endif
            @if($btn->input('btn_external'))
            target="_blank" @endif>
            @if($btn->input('btn_style') == 'outlined')
            <span class="border border-white rounded-md fill-parent"></span>
            <span class="transition bg-white opacity-0 fill-parent group-hover:opacity-5"></span>
            @endif
            {!! $btn->input('btn_text') ?? 'Learn more' !!}
        </a>
    </div>
    @endif
    @endforeach
</div>