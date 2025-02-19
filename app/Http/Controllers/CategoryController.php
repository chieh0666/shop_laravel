<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryManagePage()
    {
        $categories = Category::orderBy('parent_id', 'asc')->get();
        $binding = [
            'title' => '-類別管理',
            'page_title' => '類別管理',
            'categories' => $categories,
        ];
        return view('category.manage', $binding);
    }

    public function CategoryCreateProcess()
    {
        $default_data = [
            'parent_id' => '5',
            'name' => 'Nintendo Switch',
        ];
        Category::create($default_data);
        return redirect('/category/manage');
    }
}
