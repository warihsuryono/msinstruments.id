@extends('layouts.app')

@section('content')
    <section class="py-16 bg-gray-100">
        <!-- TITLE -->
        <div class="max-w-7xl mx-auto px-6 mb-10 text-center">
            <h2 class="text-3xl font-bold">PRODUCTS</h2>
        </div>

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
                                    {{ in_array($category->id, request('category_id', [])) ? 'checked' : '' }}
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
                                    {{ in_array($sample_category->id, request('sample_category_id', [])) ? 'checked' : '' }}
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
                                    {{ in_array($controller_type->id, request('controller_type_id', [])) ? 'checked' : '' }}
                                    value="{{ $controller_type->id }}" onchange="this.form.submit()">
                                {{ $controller_type->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Motor Type</h4>
                        @foreach ($motor_types as $motor_type)
                            <label class="flex items-center mb-2 text-sm">
                                <input type="checkbox" class="mr-2" name="motor_type_id[]" value="{{ $motor_type->id }}"
                                    {{ in_array($motor_type->id, request('motor_type_id', [])) ? 'checked' : '' }}
                                    onchange="this.form.submit()">
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
@endsection
