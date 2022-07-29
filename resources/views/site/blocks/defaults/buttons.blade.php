@php
$align = $align ?? "end";
$styles = config('styles.btns');
@endphp
<div
    class="flex flex-wrap justify---{{ $align }} {{ $align == 'end' ? 'sm:flex-row-reverse' : '' }} items-center -mx-3">
    @foreach ($buttons as $btn)
    @if ($btn->input('child_type') == 'button')
    <div class="w-full px-3 sm:w-auto">
        <a class="group {{ $styles[$btn->input('btn_style') ?? 'default'] }} {{ settings('rounded') }}"
            href="{{ $btn->input('btn_url') ?? link_url($btn) }}" @if($btn->input('btn_style') == 'underline')
            style="box-shadow: 0 .125rem;"
            @endif
            @if($btn->input('btn_external') || $btn->input('external'))
            target="_blank" @endif>
            @if($btn->input('btn_style') == 'outlined')
            <span class="border border-white {{ settings('rounded') }} fill-parent"></span>
            <span class="transition bg-white opacity-0 fill-parent group-hover:opacity-5"></span>
            @endif
            @if (env('STACK_VERSION') < 1) {!! $btn->input('btn_text') ?? ($btn->input('text') ?? 'Learn more') !!}
                @else
                {!! $btn->input('text') ?? 'Learn more' !!}
                @endif
        </a>
    </div>
    @endif
    @endforeach
</div>