<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\Category;

class HomeController extends Controller
{
    public function needForHome()
    {
        $categories = Category::all();
        $hotMerchandises = Merchandise::limit(5)->get();
        $newMerchandises = Merchandise::orderBy('created_at', 'desc')->limit(8)->get();
        $blinding = [
            'categories' => $categories,
            'hotMerchandises' => $hotMerchandises,
            'newMerchandises'  => $newMerchandises,
        ];
        return view('home', $blinding);
    }
}
