<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSInstruments</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    <header x-data="{ open: false }" class="fixed w-full bg-white shadow z-50 bg-right bg-no-repeat"
        style="background-image: url('{{ asset('img/header-bg.png') }}');">
        <div class="max-w-7xl mx-auto pl-2 pr-6 py-1 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ asset('img/logo_msi2.png') }}" alt="Logo" class="h-12 w-auto">
            </a>
            <!-- DESKTOP MENU -->
            <nav class="space-x-2 hidden md:flex">
                @foreach ($menus as $menu)
                    <a href="{{ $menu['url'] }}"
                        class="text-teal-700 hover:text-teal-500 bg-white px-6 pb-1 rounded-full font-semibold">{{ $menu['name'] }}</a>
                @endforeach

                <a href="/#about"
                    class="bg-white text-teal-700 hover:text-teal-500 px-6 pb-1 rounded-full font-semibold">About Us</a>
                <a href="/#contact"
                    class="bg-white text-teal-700 hover:text-teal-500 px-6 pb-1 rounded-full font-semibold">Contact
                    Us</a>
            </nav>

            <!-- HAMBURGER BUTTON -->
            <button @click="open = !open" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- MOBILE DROPDOWN -->
        <div x-show="open" x-transition @click.outside="open = false" class="md:hidden bg-white shadow-lg">

            <nav class="flex flex-col px-6 py-4 space-y-4">
                @foreach ($menus as $menu)
                    <a href="{{ $menu['url'] }}" class="hover:text-blue-600">{{ $menu['name'] }}</a>
                @endforeach
                <a href="about" class="hover:text-blue-600">About Us</a>
                <a href="contact" class="hover:text-blue-600">Contact</a>
            </nav>
        </div>
    </header>

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-gray-400 py-10 text-center">
        <p>© {{ date('Y') }} PT Maju Selaras Instrumindo. All rights reserved.</p>
    </footer>
</body>

</html>
