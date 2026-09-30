<header class="banner bg-yellow/80 backdrop-blur-sm py-4 transition-all duration-300 ease-in-out">
    <div class="site-container flex items-center justify-between">
        <a class="brand" href="{{ home_url('/') }}">
            @if ($logo)
                <img src="{{ $logo }}" alt="{{ $siteName }} Logo"
                    class="max-w-20 md:max-w-28 w-full object-contain h-15  brightness-0 invert-100">
            @else
                {{ $siteName }}
            @endif
        </a>

        <div class="hidden md:block">
            @include('navigation.navigation')
        </div>

        <div class="flex gap-2 md:hidden">
            <x-menu-icon color="bg-amber" />

            @if ($donateLabel && $donateLink)
                <div class="wp-block-button is-style-primary-button">
                    <a href="{{ $donateLink }}" target="_blank"
                        class="wp-block-button__link no-underline! has-base-font-size">{{ $donateLabel }}</a>
                </div>
            @endif
        </div>
    </div>

    @include('navigation.mobile-navigation')

</header>
