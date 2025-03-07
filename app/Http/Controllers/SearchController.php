<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Category;
use App\Shop\Models\Merchandise;

class SearchController extends Controller
{
    public function index()
    {
        $q = trim(request()->input('q'));

        if (empty($q)) {
            return redirect()->back();
        }
        
        $merchandiseData = Merchandise::where(function($query) use ($q) {
                                        $query->where('name', 'like', '%' . $q  . '%')
                                        ->orwhere('name_en', 'like', '%' . $q  . '%')
                                        ->orwhere('introduction', 'like', '%' . $q  . '%')
                                        ->orwhere('introduction_en', 'like', '%' . $q  . '%')
                                        ->orwhere('price', 'like', '%' . $q  . '%')
                                        ->orwhere('category_id', 'like', '%' . $q  . '%');
                                        })->get();

        $categoryData = Category::all();

        $blinding = [
            'title' => $q . ' - ',
            'pageTitle' => '的搜尋結果',
            'searchTerm' => $q,
            'merchandiseData' => $merchandiseData,
            'categoryData' => $categoryData,
        ];
        
        return view('search', $blinding);
    }
}
