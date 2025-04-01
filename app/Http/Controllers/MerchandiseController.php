<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Merchandise;
use App\Shop\Models\Category;

class MerchandiseController extends Controller
{
    public function MerchandiseManagePage()
    {
        $merchandises = Merchandise::orderBy('created_at', 'desc')->get();
        $blinding = [
            'title' => '商品管理 - ',
            'page_title' => '商品管理',
            'merchandises' => $merchandises,
        ];
        return view('merchandise.manage', $blinding);
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
                'title' => '編輯商品 - ',
                'page_title' => '編輯商品',
                'merchandise' => $merchandise,
                'categories' => Category::all(),
            ];
            return view('merchandise.edit', $blinding);
        }
    }

    public function MerchandiseEditProcess($merchandise_id)
    {
        $input = request()->all();
        
        unset($input['_token']);

        $merchandise = Merchandise::findOrFail($merchandise_id);

        if (isset($input['photo'])) {
            if ($merchandise->photo) {
                $photoPath = public_path($merchandise->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
            $photo = $input['photo'];
            $file_extension = $photo->getClientOriginalExtension();
            $file_name = uniqid() . '.' . $file_extension;
            $file_relative_path = 'images/merchandise/' . $file_name;
            $file_path = public_path($file_relative_path);
            $input['photo']->move('images/merchandise/', $file_name);
            $input['photo'] = $file_relative_path;
        }

        $merchandise->update($input);

        if (is_null(Merchandise::find($merchandise_id))) {
            return redirect('/merchandise/' . $merchandise_id . '/edit')->with('error', '商品更新失敗');
        }
        return redirect('/merchandise/' . $merchandise_id . '/edit')->with('success', '商品更新成功');
    }

    public function MerchandiseDeleteProcess($merchandise_id)
    {
        $merchandise = Merchandise::findOrFail($merchandise_id);
        if ($merchandise->photo) {
            $photoPath = public_path($merchandise->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        Merchandise::destroy($merchandise_id);
        
        return redirect('/merchandise/manage')->with('success', '商品刪除成功');;
    }

    // 所有商品
    public function MerchandisePage()
    {
        $categories = Category::all();
        $merchandises = Merchandise::all();

        $blinding = [
            'categories' => $categories,
            'merchandises' => $merchandises,
            'title' => '所有商品 - ',
            'page_title' => '所有商品',
        ];
        return view('merchandise.list', $blinding);
    }

    // 最新商品
    public function MerchandiseNewPage()
    {
        $newMerchandises = Merchandise::OrderBy('created_at', 'desc')->limit(16)->get();

        $blinding = [
            'newMerchandises' => $newMerchandises,
            'title' => '最新商品 - ',
            'page_title' => '最新商品',
        ];
        
        return view('merchandise.new', $blinding);
    }

    public function MerchandiseDetailPage($merchandise_id)
    {
        $thisMerchandise = Merchandise::where('id', $merchandise_id)->first();
        $thisMerchandiseOfCat = Category::where('id', $thisMerchandise->category_id)->first();
        $thisMerchandiseOfRootCat = Category::where('id', $thisMerchandiseOfCat->parent_id)->first();
        $blinding = [
            'thisMerchandise' => $thisMerchandise,
            'thisMerchandiseOfCat' => $thisMerchandiseOfCat,
            'thisMerchandiseOfRootCat' => $thisMerchandiseOfRootCat,
            'title' => $thisMerchandise->name . ' - '
        ];

        return view('merchandise.detail', $blinding);
    }

    // 取得商品資料json
    public function ReturnMerchandiseData()
    {
        $merchandises = Merchandise::get();
        return response()->json([
            'status' => 1,
            'msg' => 'OK',
            'data' => $merchandises,
        ]);
    }
}
