<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\News;

class NewsController extends Controller
{
    public function NewsManagePage(){
        $newses = News::orderBy('created_at', 'desc')->get();

        $blinding = [
            'title' => '新聞管理 - ',
            'page_title' => '新聞管理',
            'newses' => $newses,
        ];

        return view('news.manage', $blinding);
    }

    public function NewsCreateProcess()
    {
        $default_data = [
            'title' => '新聞標題',
            'content' => '',
            'image' => '',
        ];

        $news = News::create($default_data);

        if ($news) {
            $news->link = 'news/detail/' . $news->id;
            $news->save();
        }
        
        return redirect('/news/' . $news->id . '/edit');
    }

    public function NewsEditPage($news_id)
    {
        $news = News::findOrFail($news_id);

        $blinding = [
            'title' => '編輯新聞 - ',
            'page_title' => '編輯新聞',
            'news' => $news,
        ];

        return view('news.edit', $blinding);
    }

    public function NewsEditProcess($news_id)
    {
        $input = request()->all();

        unset($input['_token']);

        $news = News::findOrFail($news_id);

        if (isset($input['image'])) {
            if ($news->image) {
                $imgPath = public_path($news->image);
                if (file_exists($imgPath)) {
                    unlink($imgPath);
                }
            }
            $image = $input['image'];
            $file_extension = $image->getClientOriginalExtension();
            $file_name = uniqid() . '.' . $file_extension;
            $file_relative_path = 'images/news/' . $file_name;
            $file_path = public_path($file_relative_path);
            $input['image']->move('images/news/', $file_name);
            $input['image'] = $file_relative_path;
        }
        
        $news->update($input);

        return redirect('/news/' . $news_id . '/edit')->with('success', '編輯成功');
    }

    public function NewsDeleteProcess($news_id)
    {
        if (is_null(News::findOrFail($news_id))) {
            return redirect('/news/manage')->with('error', '新聞刪除失敗');
        }
        $news = News::findOrFail($news_id);
        if ($news->image) {
            $imgPath = public_path($news->image);
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
        News::destroy($news_id);

        return redirect('/news/manage')->with('success', '新聞刪除成功');
    }

    public function NewsPage()
    {
        $newses = News::orderBy('created_at', 'desc')->get();
        
        $blinding = [
            'title' => '最新消息 - ',
            'page_title' => '最新消息',
            'newses' => $newses,
        ];

        return view('news.list', $blinding);
    }

    public function NewsDetailPage($news_id)
    {
        $news = News::findOrFail($news_id);

        $blinding = [
            'title' => $news->title . ' - ',
            'page_title' => $news->title,
            'news' => $news,
        ];
        
        return view('news.detail', $blinding);
    }
}
