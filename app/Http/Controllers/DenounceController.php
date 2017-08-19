<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DenounceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request) {

        $denounce = new \App\Models\Denounce();
        $denounce->user_id = \Auth::user()->id;
        $denounce->classified_id = $request->input('classified_id');
        $denounce->category_id = $request->input('denounce_category');
        $denounce->created_at = date('Y-m-d H:i:s');
        $denounce->save();

        \App\Flash::callout('success','Classificado reportado com sucesso!', $request);

        return redirect()->back(); 
    }
}
