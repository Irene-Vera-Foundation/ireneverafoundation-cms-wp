<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content', 'sage') }}
        </a>

        <div class="sticky {{ is_user_logged_in() ? 'top-[2.9rem] md:top-8' : 'top-0' }} w-full z-10 header-trigger">
            @include('sections.header')
        </div>

        <main id="main" class="main site-container">
            @yield('content')
        </main>

        @hasSection('sidebar')
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
        @endif

        @include('sections.footer')

        <div id="backdrop" class="fixed w-full h-full inset-0 bg-amber/30 backdrop-blur-sm hidden z-5">
        </div>
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
