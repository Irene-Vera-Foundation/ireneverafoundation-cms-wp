@if ($navigation)
    <ul class="flex gap-6 navigation-menu-lists justify-end items-center">
        @foreach ($navigation as $item)
            <li id="menu-item-{{ $item->id }}"
                class="item-{{ $item->id }} {{ $item->classes ?? '' }} navigation-font font-normal"
                x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false">
                <a href="{{ $item->url }}"
                    class="menu-link underline-transition_primary relative inline-block py-4 no-underline! text-white font-medium has-base-font-size {{ $item->active || $item->activeAncestor ? 'underline-transition_primary_active' : '' }}"
                    :class="isOpen ? 'active-menu after:scale-x-100' : ''">
                    {{ $item->label }}
                </a>
            </li>
        @endforeach

        @if ($donateLabel && $donateLink)
            <div class="wp-block-button is-style-primary-button">
                <a href="{{ $donateLink }}" target="_blank"
                    class="wp-block-button__link no-underline!">{{ $donateLabel }}</a>
            </div>
        @endif
    </ul>
@endif
