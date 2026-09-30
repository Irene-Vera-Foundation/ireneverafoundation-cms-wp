<nav id="mobNav"
    class="flex flex-col justify-between pb-4 bg-amber-50 fixed z-10 left-0 top-0 w-full max-w-80 -translate-x-full overflow-y-scroll h-dvh">
    <div>
        <div class="flex justify-end w-full p-6 pr-4 pb-0 mobile-menu-item">
            <x-menu-icon color="bg-amber" />
        </div>

        @if ($navigation)
            <ul class="navigation-menu-lists flex-column items-center">
                @foreach ($navigation as $item)
                    <li id="menu-item-{{ $item->id }}"
                        class="mobile-menu-item relative border-b border-amber-400 font-semibold" x-data="{ selected: null, selectedChild: null }">
                        @if ($item->children)
                            <a role="button"
                                class="hover:text-gray-300 navigation-font w-full px-6 py-4 text-left flex justify-between capitalize {{ $item->active ? 'text-primary-700' : 'text-gray-50' }}"
                                @click="selected !== '{{ $item->id }}' ? selected = '{{ $item->id }}' : selected = null">
                            @else
                                <a href="{{ $item->url }}"
                                    class="hover:text-gray-300 navigation-font capitalize w-full px-6 py-4 text-left flex justify-between text-amber-900 no-underline!">
                        @endif
                        {!! $item->label !!}
                        @if ($item->children)
                            <i class="absolute right-10 transition-transform duration-200 ease-in-out bi-chevron-down"
                                x-bind:class="{ 'rotate-180': selected, '': !selected }"></i>
                        @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</nav>
