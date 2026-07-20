<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company - Air Monitoring</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    <header class="fixed w-full bg-white shadow z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="font-bold text-xl">YourCompany</h1>
            <nav class="space-x-6 hidden md:block">
                <a href="#" class="hover:text-blue-600">Home</a>
                <a href="#" class="hover:text-blue-600">Products</a>
                <a href="#" class="hover:text-blue-600">Services</a>
                <a href="#" class="hover:text-blue-600">About</a>
                <a href="#" class="hover:text-blue-600">Contact</a>
            </nav>
        </div>
    </header>

    {{-- HERO --}}
    <section class="h-screen flex items-center justify-center bg-gray-900 text-white text-center">
        <div>
            <h2 class="text-5xl font-bold mb-6">
                From Air to Water<br> We Measure It All
            </h2>
            <p class="mb-6 text-lg text-gray-300">
                Proudly Local, Built to Global Standards
            </p>
            <a href="#" class="bg-blue-600 px-6 py-3 rounded hover:bg-blue-700">
                Browse Product
            </a>
        </div>
    </section>

    {{-- PRODUCT CATEGORIES --}}
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12">Product Categories</h3>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach (['High Volume Sampler', 'Low Volume Sampler', 'Filters', 'Calibration Equipment', 'Zero Air Generator', 'Parts & Components'] as $item)
                    <div class="bg-white p-8 shadow hover:shadow-lg transition">
                        <h4 class="text-xl font-semibold mb-3">{{ $item }}</h4>
                        <p class="text-gray-500 text-sm">
                            High precision equipment for monitoring applications
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FEATURED PRODUCTS --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12">
                Industry-Leading Instrumentation
            </h3>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center">
                    <div class="h-48 bg-gray-200 mb-4"></div>
                    <h4 class="font-bold">TSP High Volume</h4>
                    <p class="text-sm text-gray-500">
                        Rugged particulate sampling system
                    </p>
                </div>

                <div class="text-center">
                    <div class="h-48 bg-gray-200 mb-4"></div>
                    <h4 class="font-bold">PM10 Sampler</h4>
                    <p class="text-sm text-gray-500">
                        EPA-compliant high accuracy monitoring
                    </p>
                </div>

                <div class="text-center">
                    <div class="h-48 bg-gray-200 mb-4"></div>
                    <h4 class="font-bold">Low Volume</h4>
                    <p class="text-sm text-gray-500">
                        Modern data-driven sampling system
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12">Our Services</h3>

            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h4 class="font-semibold mb-2">Equipment Rental</h4>
                    <p class="text-sm text-gray-500">
                        Flexible monitoring solutions for projects
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-2">Calibration</h4>
                    <p class="text-sm text-gray-500">
                        NIST-traceable calibration services
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-2">Technical Support</h4>
                    <p class="text-sm text-gray-500">
                        Expert assistance from engineers
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="py-20">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h3 class="text-3xl font-bold mb-6">Who We Are</h3>
            <p class="text-gray-600">
                We are a leading manufacturer of air monitoring instrumentation,
                delivering high precision equipment for environmental compliance
                and scientific research.
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
        <p>© {{ date('Y') }} YourCompany. All rights reserved.</p>
    </footer>

</body>

</html>
