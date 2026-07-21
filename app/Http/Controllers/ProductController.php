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
        $categories = Category::where('id', '>', 0)->orderBy('id')->get();
        $sample_categories = SampleCategory::orderBy('id')->get();
        $controller_types = ControllerType::orderBy('id')->get();
        $motor_types = MotorType::orderBy('id')->get();

        $category_ids = $request->input('category_id', []);
        $sample_category_ids = $request->input('sample_category_id', []);
        $controller_type_ids = $request->input('controller_type_id', []);
        $motor_type_ids = $request->input('motor_type_id', []);

        $products = Product::query()
            ->when(!empty($category_ids), function ($q) use ($category_ids) {
                $q->whereIn('category_id', $category_ids);
            })
            ->when(!empty($sample_category_ids), function ($q) use ($sample_category_ids) {
                $q->whereIn('sample_category_id', $sample_category_ids);
            })
            ->when(!empty($controller_type_ids), function ($q) use ($controller_type_ids) {
                $q->whereIn('controller_type_id', $controller_type_ids);
            })
            ->when(!empty($motor_type_ids), function ($q) use ($motor_type_ids) {
                $q->whereIn('motor_type_id', $motor_type_ids);
            })
            ->get();

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
