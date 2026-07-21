<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ControllerType;
use App\Models\HeroImage;
use App\Models\MotorType;
use App\Models\Product;
use App\Models\SampleCategory;

class HomeController extends Controller
{
    public function index()
    {
        $menus = [
            ['name' => 'Air Sampler', 'url' => 'products?sample_category_id[]=1'],
            ['name' => 'Water Sampler', 'url' => 'products?sample_category_id[]=2'],
            ['name' => 'CEMS', 'url' => 'products?sample_category_id[]=3'],
        ];
        $hero_images = HeroImage::all();
        $popular_categories = Category::where('popular_seq', '>', 0)->orderBy('popular_seq')->get();
        $categories = Category::where('id', '>', 0)->orderBy('id')->get();
        $sample_categories = SampleCategory::orderBy('id')->get();
        $controller_types = ControllerType::orderBy('id')->get();
        $motor_types = MotorType::orderBy('id')->get();
        $query = null;
        foreach ([1, 3, 4, 8] as $category_id) {
            $sub = Product::where('category_id', $category_id)->inRandomOrder()->limit(3);
            if ($query === null) $query = $sub;
            else $query = $query->unionAll($sub);
        }
        $products = $query->get();
        $data = [
            'menus' => $menus,
            'hero_images' => $hero_images,
            'popular_categories' => $popular_categories,
            'categories' => $categories,
            'sample_categories' => $sample_categories,
            'controller_types' => $controller_types,
            'motor_types' => $motor_types,
            'products' => $products
        ];
        return view('home', $data);
    }
}
