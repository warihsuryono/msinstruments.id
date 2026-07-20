<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $menus = [
            ['name' => 'Air Sampler', 'url' => '/sample_category/1'],
            ['name' => 'Water Sampler', 'url' => '/sample_category/2'],
            ['name' => 'CEMS', 'url' => '/sample_category/3'],
        ];
        $categories = Category::where('popular_seq', '>', 0)->orderBy('popular_seq')->get();
        return view('home', ['menus' => $menus, 'categories' => $categories]);
    }
}
