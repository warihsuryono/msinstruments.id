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

    public function common_data()
    {
        $menus = [
            ['name' => 'Air Sampler', 'url' => '/products?sample_category_id[]=1'],
            ['name' => 'Water Sampler', 'url' => '/products?sample_category_id[]=2'],
            ['name' => 'CEMS', 'url' => 'products?sample_category_id[]=3'],
        ];
        $categories = Category::where('id', '>', 0)->orderBy('id')->get();
        $sample_categories = SampleCategory::orderBy('id')->get();
        $controller_types = ControllerType::orderBy('id')->get();
        $motor_types = MotorType::orderBy('id')->get();
        return [
            'menus' => $menus,
            'categories' => $categories,
            'sample_categories' => $sample_categories,
            'controller_types' => $controller_types,
            'motor_types' => $motor_types,
        ];
    }

    public function index(Request $request)
    {

        $data = $this->common_data();
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

        $data = $data + ['products' => $products];

        return view('products', $data);
    }

    public function detail(Request $request, $id)
    {

        $data = $this->common_data();
        $category_ids = $request->input('category_id', []);
        $sample_category_ids = $request->input('sample_category_id', []);
        $controller_type_ids = $request->input('controller_type_id', []);
        $motor_type_ids = $request->input('motor_type_id', []);

        $product = Product::findOrFail($id);
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

        $data = $data + ['product' => $product, 'products' => $products];

        return view('product', $data);
    }
}
