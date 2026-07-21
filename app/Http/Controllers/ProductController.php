<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ControllerType;
use App\Models\MotorType;
use App\Models\Product;
use App\Models\SampleCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $menus = [
            ['name' => 'Air Sampler', 'url' => 'products?sample_category_id[]=1'],
            ['name' => 'Water Sampler', 'url' => 'products?sample_category_id[]=2'],
            ['name' => 'CEMS', 'url' => 'products?sample_category_id[]=3'],
        ];
        $popular_categories = Category::where('popular_seq', '>', 0)->orderBy('popular_seq')->get();
        // $categories = Category::where('id', '>', 0)->orderBy('id')->get();
        $sample_categories = SampleCategory::orderBy('id')->get();
        $controller_types = ControllerType::orderBy('id')->get();
        $motor_types = MotorType::orderBy('id')->get();

        $categoryIds = $request->input('category_id', []);

        $products = Product::when($categoryIds, function ($q) use ($categoryIds) {
            $q->whereIn('category_id', $categoryIds);
        })->latest()->get();

        $categories = Category::all();

        $data = [
            'menus' => $menus,
            'popular_categories' => $popular_categories,
            'categories' => $categories,
            'sample_categories' => $sample_categories,
            'controller_types' => $controller_types,
            'motor_types' => $motor_types,
            'products' => $products
        ];

        return view('products', $data);
    }
}
