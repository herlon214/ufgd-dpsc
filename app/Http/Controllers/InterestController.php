<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\Interest;
use App\Http\Requests;

class InterestController extends Controller {
    public function __construct() {
      $this->middleware('auth');
    }

    public function create(FormBuilder $formBuilder) {
        $form = $formBuilder->create(Interest::class, [
            'method' => 'POST',
            'url' => action('InterestController@store')
        ]);

        return view('interest.create', ['form' => $form]);
    }

    public function store(FormBuilder $formBuilder, Request $request) {
        $form = $formBuilder->create(Interest::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        $categories = array_pluck($values['categories'], '0');
        
        $item = new \App\Models\ClassifiedInterest();
        $item->user_id = \Auth::user()->id;
        $item->categories = implode($categories, ',');

        if($item->save()) {
            \App\Flash::callout('success', 'Interesse cadastrado com sucesso!', $request);
            return redirect('/');
        }
    }
}
