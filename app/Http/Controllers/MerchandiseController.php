<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Category;

class MerchandiseController extends Controller
{
    public function MerchandiseManagePage()
    {
        $merchandises = Merchandise::orderBy('created_at', 'desc')->get();
        $binding = [
            'title' => '-商品管理',
            'page_title' => '商品管理',
            'merchandises' => $merchandises,
        ];
        return view('merchandise.manage', $binding);
    }

    public function MerchandiseCreateProcess()
    {
        $merchandise_data = [
            'category_id' => '',
            'status' => 'C',
            'name' => '',
            'name_en' => '',
            'introduction' => '',
            'introduction_en' => '',
            'photo' => '',
            'price' => 0,
            'remain_count' => 0,
        ];

        if (Category::all()->count() == 0) {
            $default_category = [
                'parent_id' => '0',
                'name' => '未分類',
            ];
            Category::create($default_category);
        }

        $merchandise_data['category_id'] = Category::all()->first()->id;
        $merchandise = Merchandise::create($merchandise_data);
        return redirect('/merchandise/' . $merchandise->id . '/edit');
    }

    public function MerchandiseEditPage($merchandise_id)
    {
        $merchandise = Merchandise::where('id', $merchandise_id);
        if ($merchandise->count() === 0) {
            return redirect('/merchandise/manage');
        } else {
            $merchandise = $merchandise->first();

            $blinding = [
                'title' => '-編輯商品',
                'page_title' => '編輯商品',
                'merchandise' => $merchandise,
                'categories' => Category::all(),
            ];
            return view('merchandise.edit', $blinding);
        }
    }

    public function MerchandiseEditProcess($merchandise_id, Request $request)
    {
        $input = request()->all();
        
        unset($input['_token']);

        if (isset($input['photo'])) {
            $photo = $input['photo'];
            $file_extension = $photo->getClientOriginalExtension();
            $file_name = uniqid() . '.' . $file_extension;
            $file_relative_path = 'images/merchandise/' . $file_name;
            $file_path = public_path($file_relative_path);
            $input['photo']->move('images/merchandise/', $file_name);
            $input['photo'] = $file_relative_path;
        }

        Merchandise::where('id', $merchandise_id)->update($input);

        return redirect('/merchandise/' . $merchandise_id . '/edit')->with('success', '更新成功');
    }

    public function MerchandiseDeleteProcess($merchandise_id)
    {
        Merchandise::destroy($merchandise_id);
        return redirect('/merchandise/manage')->with('success', '刪除成功');;
    }
}
