<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Merchandise;
use App\Shop\Models\Category;
use App\Shop\Models\Announcement;
use App\Shop\Models\News;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $hotMerchandises = Merchandise::limit(5)->get();
        $newMerchandises = Merchandise::orderBy('created_at', 'desc')->limit(8)->get();
        $announcement = Announcement::select('title', 'is_active')
                                    ->where('start_date', '<=', date('Y-m-d'))
                                    ->where('end_date', '>=', date('Y-m-d'))
                                    ->first();
        $newses =  News::select('title','image', 'link', 'is_active')->get();

        $blinding = [
            'categories' => $categories,
            'hotMerchandises' => $hotMerchandises,
            'newMerchandises'  => $newMerchandises,
            'announcement' => $announcement,
            'newses' => $newses,
        ];

        return view('home', $blinding);
    }
}
