<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company - Air Monitoring</title>
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

                <a href="about"
                    class="bg-white text-teal-700 hover:text-teal-500 px-6 pb-1 rounded-full font-semibold">About Us</a>
                <a href="contact"
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
        </div>
    </header>

    {{-- HERO --}}
    <section class="relative h-screen overflow-hidden">

        <!-- SLIDES -->
        <div id="slider" class="absolute inset-0">
            <div class="slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100"
                style="background-image: url('{{ asset('images/home01.png') }}')"></div>

            <div class="slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
                style="background-image: url('{{ asset('images/home02.png') }}')"></div>

            <div class="slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
                style="background-image: url('{{ asset('images/home03.png') }}')"></div>
        </div>

        <!-- OVERLAY -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- CONTENT -->
        <div class="relative z-10 h-full flex items-center justify-center text-center text-white px-6">
            <div>
                <h2 class="text-4xl md:text-6xl font-bold mb-6">
                    From Air to Water<br> We Measure It All
                </h2>

                <p class="mb-6 text-lg text-gray-300">
                    Proudly Local, Built to Global Standards
                </p>

                <a href="#" class="bg-blue-600 px-6 py-3 rounded hover:bg-blue-700">
                    Browse Product
                </a>
            </div>
        </div>

    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12">
                Popular Categories
            </h3>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach ($categories as $category)
                    <div class="text-center">
                        <div class="h-48 bg-gray-200 mb-4">
                            <img src="{{ asset('storage/' . $category['image']) }}"
                                alt="{{ $category['name'] }}"class="w-full h-48 object-cover">
                        </div>
                        <h4 class="font-bold">{{ $category['name'] }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    {{-- ABOUT --}}
    <section class="py-20">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h3 class="text-3xl font-bold mb-6">Who We Are</h3>
            <p class="text-gray-600">
                We deliver reliable solutions for water, soil, and air quality testing. From high-quality instruments to
                professional laboratory equipment repair services, we support your environmental monitoring needs.
            </p>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-blue-600 text-white text-center">
        <h3 class="text-3xl font-bold mb-4">Ready to Talk?</h3>
        <p class="mb-6">Contact our team for consultation</p>
        <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded">
            Contact Us
        </a>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-gray-400 py-10 text-center">
        <p>© {{ date('Y') }} PT Maju Selaras Instrumindo. All rights reserved.</p>
    </footer>

    <script>
        const slides = document.querySelectorAll('#slider .slide');
        let current = 0;

        setInterval(() => {
            slides[current].classList.remove('opacity-100');
            slides[current].classList.add('opacity-0');

            current = (current + 1) % slides.length;

            slides[current].classList.remove('opacity-0');
            slides[current].classList.add('opacity-100');
        }, 6000); // ganti tiap 4 detik
    </script>

</body>

</html>
