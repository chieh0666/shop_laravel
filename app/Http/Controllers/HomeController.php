<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Category;

class HomeController extends Controller
{
    public function CategoriesList()
    {
        $categories = Category::all();
        $blinding = [
            'categories' => $categories,
        ];
        return view('home', $blinding);
    }
}
