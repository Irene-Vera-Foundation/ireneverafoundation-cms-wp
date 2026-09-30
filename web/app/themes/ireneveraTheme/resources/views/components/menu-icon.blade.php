@props(['color' => 'bg-amber'])

<div class="menu h-10 w-8 relative cursor-pointer transition-all duration-200 ease-in-out">
    <span
        class="top-line w-5 h-0.5 absolute top-3 left-1/2 {{ $color }} transition-all duration-200 ease-in-out -translate-x-1/2"></span>
    <span
        class="middle-line w-5 h-0.5 absolute top-1/2 left-1/2 {{ $color }} transition-all duration-200 ease-in-out -translate-x-1/2 -translate-y-1/2"></span>
    <span
        class="bottom-line w-5 h-0.5 absolute bottom-3 left-1/2 {{ $color }} transition-all duration-200 ease-in-out -translate-x-1/2"></span>
</div>
