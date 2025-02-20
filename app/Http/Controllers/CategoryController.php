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
            'parent_id' => '0',
            'name' => '新類別',
        ];
        $category = Category::create($default_data);

        return redirect('/category/' . $category->id . '/edit');
    }

    public function CategoryEditPage($category_id)
    {
        $thisCategory = Category::where('id',$category_id)->first();

        if(is_null($thisCategory)){
            return redirect('/category/manage')->with('error', '類別不存在');
        }

        $binding = [
            'title' => '-編輯類別',
            'page_title' => '編輯類別',
            'thisCategory' => $thisCategory,
            'categories' => Category::all(),
        ];
        return view('category.edit', $binding);
    }

    public function CategoryEditProcess($category_id)
    {
        $thisCategory = Category::where('id', $category_id)->fiest();

        if (is_null($thisCategory)) {
            return redirect('/category/manage')->with('error', '類別不存在');
        }


    }
}
