<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    public function index() {
        $classifieds = \App\Models\Classified::get();

        return view('home', ['classifieds' => $classifieds]);
    }

    public function search(Request $request) {
        $field = $request->input('pesquisa');
        $classifieds = \App\Models\Classified::where('description', 'LIKE', '%'.$field.'%')->orWhere('title', 'LIKE', '%'.$field.'%')->get();

        return view('home', ['classifieds' => $classifieds]);
    }

    public function category($id) {
        $category = \App\Models\ClassifiedCategory::find($id);
        $classifieds = \App\Models\Classified::where('category_id','=', $id)->get();
        
        return view('by_category', ['classifieds' => $classifieds, 'category' => $category]);
    }
}
