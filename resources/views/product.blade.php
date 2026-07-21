@extends('layouts.app')

@section('content')
    <!-- HEADER TITLE -->
    <section class="py-24 ">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">
                {{ $product->name }}
            </h1>
            @if ($product->sku)
                <p class="text-gray-500 mt-2"> SKU: {{ $product->sku }} </p>
            @endif
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section>
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">
            <div class="p-6 rounded-lg relative">
                @if ($product->product_image->count())
                    <!-- IMAGES -->
                    @foreach ($product->product_image as $index => $img)
                        <img src="{{ asset('storage/' . $img->image) }}"
                            class="w-full h-96 object-contain slider-image {{ $index == 0 ? '' : 'hidden' }}">
                    @endforeach

                    <!-- BUTTON -->
                    <button onclick="prevSlide()"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded">
                        <x-heroicon-o-chevron-left class="w-6 h-6" />
                    </button>

                    <button onclick="nextSlide()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded">
                        <x-heroicon-o-chevron-right class="w-6 h-6" />
                    </button>

                    {{-- slider --}}
                @else
                    <img src="{{ asset('img/no-image.png') }}" class="w-full h-96 object-contain">
                @endif
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-4">Description</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $product->description ?? ($product->short_description ?? 'No description available.') }}
                </p>

                {{-- <a href="#"
                    class="inline-block bg-teal-600 text-white px-6 py-3 rounded hover:bg-teal-700 transition">
                    Request a Quote
                </a> --}}

            </div>
        </div>
    </section>

    <!-- SPECIFICATION -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto px-6">

            <h2 class="text-2xl font-bold mb-6 text-center">
                Specifications
            </h2>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left text-sm">

                    <tbody>

                        @if ($product->product_specification->count())
                            @foreach ($product->product_specification as $specification)
                                <tr class="border-b">
                                    <td class="p-4 font-semibold w-1/3 bg-gray-50">
                                        {!! $specification->name !!}
                                    </td>
                                    <td class="p-4 text-gray-600">
                                        {!! $specification->specification !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="p-4 text-gray-500">
                                    No specifications available
                                </td>
                            </tr>
                        @endif

                    </tbody>

                </table>
            </div>

        </div>
    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        let current = 0;
        const slides = document.querySelectorAll('.slider-image');

        if (!slides.length) return;

        function showSlide(index) {
            slides.forEach((img, i) => {
                img.classList.toggle('hidden', i !== index);
            });
        }

        window.nextSlide = function() {
            current = (current + 1) % slides.length;
            showSlide(current);
        }

        window.prevSlide = function() {
            current = (current - 1 + slides.length) % slides.length;
            showSlide(current);
        }

    });
</script>
