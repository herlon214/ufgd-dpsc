<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\Classified;
use App\Forms\Comment;
use App\Http\Requests;

class ClassifiedsController extends Controller {
    public function __construct() {
      $this->middleware('auth', ['except' => 'show']);
    }

    public function index() {
      $classifieds = \App\Models\Classified::where('user_id', '=', \Auth::user()->id)->get();

      return view('classifieds.index', ['classifieds' => $classifieds]);
    }

    public function edit($id, Request $request) {
      $classified = \App\Models\Classified::find($id);

      $form = \FormBuilder::create(Classified::class, [
        'method' => 'PUT',
        'model' => $classified,
        'url' => action('ClassifiedsController@update', $id)
      ]);

      return view('classifieds.edit', ['classified' => $classified, 'form' => $form]);
    }

    public function update($id, Request $request) {
      $classified = \App\Models\Classified::find($id);

      $form = \FormBuilder::create(Classified::class);
      
      if (!$form->isValid()) {
          return redirect()->back()->withErrors($form->getErrors())->withInput();
      }

      $values = $form->getFieldValues();
      $classified = $this->parseValues($values, $classified, $request);

      $classified->save();
      \App\Flash::callout('success', 'Classificado alterado com sucesso.', $request);
      
      return redirect()->back();
    }

    public function show($id, Request $request, FormBuilder $formBuilder) {
      $data['classified'] = \App\Models\Classified::with(['Comments' => function($query) {
        $query->orderBy('id','DESC')->with('User');
      }])->find($id);
      $data['denounce_categories'] = \App\Models\DenounceCategory::get();
      $comment = new \App\Models\Comment();
      $comment->classified_id = $id;
      $data['comment_form'] = $formBuilder->create(Comment::class, [
        'method' => 'POST',
        'model' => $comment,
        'url' => action('CommentsController@store')
      ]);

      return view('classifieds.show', $data);
    }

    public function create(Request $request, FormBuilder $formBuilder) {
      $form = $formBuilder->create(Classified::class, [
        'method' => 'POST',
        'url' => action('ClassifiedsController@store')
      ]);

      return view('classifieds.create', ['title' => 'Criar novo classificado', 'form' => $form]);
    }

    public function store(Request $request, FormBuilder $formBuilder) {
      $form = $formBuilder->create(Classified::class);
      
      if (!$form->isValid()) {
          return redirect()->back()->withErrors($form->getErrors())->withInput();
      }

      $values = $form->getFieldValues();      
      $classified = $this->parseValues($values, new \App\Models\Classified(), $request);
      $classified->save();
      \App\Flash::callout('success', 'Classificado criado com sucesso!', $request);

      return redirect(action('ClassifiedsController@show', $classified->id));
    }

    public function destroy($id, Request $request) {
      $classified = \App\Models\Classified::find($id);

      $classified->delete();

      \App\Flash::callout('success', 'Classificado deletado com sucesso!', $request);
      return redirect()->back();
    }

    private function parseValues($values, $model, $request) {
      
      $model->title = $values['title'];
      $model->description = $values['description'];
      $model->state = $values['state'];
      $model->contact_phone = $values['contact_phone'];
      $model->contact_name = $values['contact_name'];
      $model->user_id = \Auth::user()->id;
      $model->cep = $values['cep'];
      $model->category_id = $values['category_id'];
      if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $model->photo_url = $file->move('classifieds', sha1(time()).'.'.$file->extension());
      }

      return $model;
    }


}
