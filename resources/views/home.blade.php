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

                <a href="#about"
                    class="bg-white text-teal-700 hover:text-teal-500 px-6 pb-1 rounded-full font-semibold">About Us</a>
                <a href="#contact"
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
                <a href="#about" class="hover:text-blue-600">About Us</a>
                <a href="#contact" class="hover:text-blue-600">Contact</a>
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

                <a href="#browse_product" class="bg-teal-600 px-6 py-3 rounded hover:bg-teal-700">
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
                @foreach ($popular_categories as $category)
                    <div class="text-center cursor-pointer"
                        onclick="window.location='/products?category_id[]={{ $category->id }}';">
                        <div class="h-48 bg-gray-200 mb-4">
                            <img src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"class="w-full h-48 object-cover">
                        </div>
                        <h4 class="font-bold">{{ $category->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-16 bg-gray-100" id="browse_product">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-8">

            <!-- SIDEBAR FILTER -->
            <div class="md:col-span-1 bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-6">Filters</h3>
                <form method="GET" action="/products">
                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Category</h4>
                        @foreach ($categories as $category)
                            <label class="flex items-center mb-2 text-sm">
                                <input type="checkbox" class="mr-2" name="category_id[]" value="{{ $category->id }}"
                                    onchange="this.form.submit()">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Sample Type</h4>
                        @foreach ($sample_categories as $sample_category)
                            <label class="flex items-center mb-2 text-sm">
                                <input type="checkbox" class="mr-2" name="sample_category_id[]"
                                    value="{{ $sample_category->id }}" onchange="this.form.submit()">
                                {{ $sample_category->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Controller Type</h4>
                        @foreach ($controller_types as $controller_type)
                            <label class="flex items-center mb-2 text-sm">
                                <input type="checkbox" class="mr-2" name="controller_type_id[]"
                                    value="{{ $controller_type->id }}" onchange="this.form.submit()">
                                {{ $controller_type->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Motor Type</h4>
                        @foreach ($motor_types as $motor_type)
                            <label class="flex items-center mb-2 text-sm">
                                <input type="checkbox" class="mr-2" name="motor_type_id[]"
                                    value="{{ $motor_type->id }}" onchange="this.form.submit()">
                                {{ $motor_type->name }}
                            </label>
                        @endforeach
                    </div>
                </form>
            </div>

            <!-- PRODUCT LIST -->
            <div class="md:col-span-3">

                <!-- HEADER -->
                {{-- <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">{{ count($products) }} Items</p>

                    <div class="flex items-center space-x-4 text-sm">
                        <span>View: 24 / Page</span>
                        <span>Sort: Featured</span>
                    </div>
                </div> --}}

                <!-- GRID -->
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition cursor-pointer"
                            onclick="window.location='/product/{{ $product->id }}';">
                            <img src="{{ asset('storage/' . @$product->product_image()->first()->image) }}"
                                class="w-full h-48 object-contain mb-4">
                            <h4 class="font-semibold mb-2 text-sm">{{ $product->name }}</h4>
                            <p class="text-gray-500 text-sm mb-2">{{ $product->short_description }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="py-20">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h3 class="text-3xl font-bold mb-6">Who We Are</h3>
            <p class="text-gray-600">
                We deliver reliable solutions for water, soil, and air quality testing. From high-quality instruments to
                professional laboratory equipment repair services, we support your environmental monitoring needs.
            </p>
        </div>
    </section>

    <section id="contact" class="py-20 bg-teal-700 text-white">
        <div class="max-w-7xl mx-auto px-6">

            <!-- TITLE -->
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold">Contact Us</h3>
                <p class="text-white mt-2">
                    Get in touch with our team for inquiries and support
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 text-center">

                <!-- ADDRESS -->
                <div class="bg-gray-800 p-6 rounded-lg hover:bg-gray-700 transition text-left">
                    <h4 class="text-xl font-semibold mb-6 text-center">📍 Address</h4>

                    <!-- HEAD OFFICE -->
                    <div class="mb-4">
                        <p class="font-semibold text-white">🏢 Head Office</p>
                        <p class="text-gray-400 text-sm">
                            Ruko Ciledug Mas<br>
                            Jl. HOS Cokroaminoto No.C5<br>
                            Sudimara Timur, Kec. Ciledug
                            <br>Kota Tangerang, Banten 15151
                        </p>
                    </div>

                    <!-- BRANCH -->
                    <div class="mb-4">
                        <p class="font-semibold text-white">🏬 Branch Office</p>
                        <p class="text-gray-400 text-sm">
                            Dusun Balongjarak Desa Balonggarut<br>
                            RT 004 RW 02 Kec.Krembung<br>
                            Kab.Sidoarjo Jawa Timur
                        </p>
                    </div>

                    <!-- FACTORY -->
                    <div>
                        <p class="font-semibold text-white">🏭 Factory</p>
                        <p class="text-gray-400 text-sm">
                            Duta Indah Starhub<br>
                            Jl Saluran Irigasi Cisadane Timur Blok X17<br>
                            Kec. Benda, Kota Tangerang, Banten 15123
                        </p>
                    </div>
                </div>

                <!-- PHONE -->
                <div class="bg-gray-800 p-6 rounded-lg hover:bg-gray-700 transition text-left">
                    <h4 class="text-xl font-semibold mb-6 text-center">📞 Contact Numbers</h4>

                    <!-- HOTLINE 1 -->
                    <div class="mb-3">
                        <p class="font-semibold text-white">Hotline 1</p>
                        <a href="tel:+6281234567890" class="text-gray-400 text-sm hover:text-white">
                            +62 822-1111-2335
                        </a>
                    </div>

                    <!-- HOTLINE 2 -->
                    <div class="mb-3">
                        <p class="font-semibold text-white">Hotline 2</p>
                        <a href="tel:+6289876543210" class="text-gray-400 text-sm hover:text-white">
                            +62 857-7556-1612
                        </a>
                    </div>

                    <!-- PHONE -->
                    <div class="mb-3">
                        <p class="font-semibold text-white">Phone</p>
                        <a href="tel:+622112345678" class="text-gray-400 text-sm hover:text-white">
                            +62 21 22278639
                        </a>
                    </div>

                    <!-- FAX -->
                    <div>
                        <p class="font-semibold text-white">Fax</p>
                        <p class="text-gray-400 text-sm">
                            +62 21 22278639
                        </p>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="bg-gray-800 p-6 rounded-lg hover:bg-gray-700 transition">
                    <h4 class="text-xl font-semibold mb-2">✉️ Email</h4>
                    <p class="text-gray-400">
                        majuselaras@gmail.com
                    </p>
                </div>

            </div>

        </div>
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
