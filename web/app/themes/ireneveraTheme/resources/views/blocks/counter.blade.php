@unless ($block->preview)
    <div {{ $attributes }}>
    @endunless

    <div class="counter-display" data-counter-suffix="{{ $suffix }}">
        <span class="counter-prefix"></span><span class="counter-value" data-counter-value="{{ $counter }}"
            data-counter-speed="{{ $speed }}">
            @if ($block->preview)
                {{ $counter }}
            @endif
        </span><span class="counter-suffix">
            @if ($block->preview)
                {{ $suffix }}
            @endif
        </span>
    </div>

    @unless ($block->preview)
    </div>
@endunless
