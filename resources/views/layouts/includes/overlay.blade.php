@php
$screens = array_reverse(['xl', 'lg', 'md', 'sm']);
@endphp
<div class="min-h-screen pointer-events-none fill-parent grid-overlay">
    <div class="fixed fill-parent">
        <x-container>
            <x-cols class="h-screen">
                @for ($i = 0; $i < 12; $i++)
                    <x-col class="w-1/3 md:w-1/6 xl:w-1/12">
                        <div class="h-screen border-grid"></div>
                    </x-col>
                @endfor
            </x-cols>

        </x-container>
    </div>
</div>

<style>
    .show-screen {
        display: none;
        z-index: 510;
    }

    .show-screen>div {
        border-color: #4398ff2f;
    }

    .show-overlay .show-screen {
        display: block;
    }

    .show-overlay .show-rhythm {
        background: rgba(0, 162, 255, 0.123);
    }

    .border-grid {
        box-shadow:
            1px 0 #4398ff2f,
            inset 1px 0 #4398ff2f;
    }

    .show-overlay .grid-overlay {
        opacity: 1;
    }

    .grid-overlay {
        transition: all .2s ease;
        opacity: 0;
        z-index: 500;
        background-size: 100% 2rem;
        background-image: linear-gradient(0deg,
                #4398ff2f 0px,
                #4398ff2f 1px,
                transparent 1px,
                transparent 0.5rem,
                #4398ff2f 0.5rem,
                #4398ff2f calc(0.5rem + 1px),
                transparent calc(0.5rem + 1px),
                transparent 1rem,
                #4398ff2f 1rem,
                #4398ff2f calc(1rem + 1px),
                transparent calc(1rem + 1px),
                transparent 1.5rem,
                #4398ff2f 1.5rem,
                #4398ff2f calc(1.5rem + 1px),
                transparent calc(1.5rem + 1px),
                transparent 2rem);
    }

</style>

<div class="fixed bottom-0 right-0 show-screen">
    <div class="font-mono text-xs text-white uppercase bg-black border-t border-l">
        <div class="px-2 leading-6 tracking-widest">
            <span style="font-size: .65rem">
                {{-- <i class="material-icons" style="font-size: 1.5em; top: 1.5px; margin-right: -2px">fullscreen</i> --}}
                <span>Screen:</span>
                @foreach ($screens as $screen)
                    <span class="@foreach ($screens as $other) @if ($other !== $screen)
                        {{ $other }}:hidden @endif @endforeach {{ $screen }}:inline hidden">{{ $screen }}
                    </span>
                @endforeach
                <span class="sm:hidden">xs</span>
            </span>
        </div>
    </div>
</div>

<script>
    const body = document.querySelector('body');

    // body.classList.add('show-overlay');
    if (window.location.search.indexOf('overlay') > -1) {
        body.classList.add('show-overlay');
    }

    document.addEventListener('keydown', e => {
        if (e.keyCode == 71) {
            body.classList.toggle('show-overlay');
        }
        if (e.keyCode == 68) {
            document.documentElement.classList.toggle('dark')
        }
    })
</script>
