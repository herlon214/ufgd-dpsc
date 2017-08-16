<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassifiedsController extends Controller
{
    public function show($id, Request $request) {
      $classified = \App\Models\Classified::find($id);

      return view('classified', ['classified' => $classified]);
    }


}
