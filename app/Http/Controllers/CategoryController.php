<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Category;

class CategoryController extends Controller
{
    public function CategoryManagePage()
    {
        if (Category::all()->count() == 0) {
            $default_category = [
                'parent_id' => '0',
                'name' => '未分類',
            ];
            Category::create($default_category);
        }

        $categories = Category::orderBy('parent_id', 'asc')->get();
        
        $blinding = [
            'title' => '類別管理 - ',
            'page_title' => '類別管理',
            'categories' => $categories,
        ];
        return view('category.manage', $blinding);
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

        $blinding = [
            'title' => '編輯類別 - ',
            'page_title' => '編輯類別',
            'thisCategory' => $thisCategory,
            'categories' => Category::all(),
        ];
        return view('category.edit', $blinding);
    }

    public function CategoryEditProcess($category_id)
    {
        $input = request()->all();
        $thisCategory = Category::where('id', $category_id)->first();
        if (is_null($thisCategory)) {
            return redirect('/category/manage')->with('error', '類別不存在');
        }
        if (isset($input['to_parent_id'])) {
            $input['parent_id'] = $input['to_parent_id'];
        }
        $thisCategory->update($input);
        return redirect('/category/' . $thisCategory->id . '/edit')->with('success', '類別更新成功');
    }

    public function CategoryDeleteProcess($category_id)
    {
        if (is_null(Category::find($category_id))) {
            return redirect('/category/manage')->with('error', '類別刪除失敗');

        }
        Category::destroy($category_id);

        return redirect('/category/manage')->with('success', '類別刪除成功');
    }
}
