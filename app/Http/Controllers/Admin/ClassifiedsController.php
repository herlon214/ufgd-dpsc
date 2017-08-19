<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Forms\Classified;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class ClassifiedsController extends \App\Http\Controllers\Controller {
    
    public function construct() {
      $this->middleware('auth');
    }
    
    public function index() {
        $comments = \App\Models\Classified::with('User')->get();

        return view('admin.classifieds.index', ['items' => $comments]);
    }

    public function show($id) {
        $item = \App\Models\Classified::find($id);

        return view('admin.classifieds.show', ['item' => $item]);
    }

    public function edit($id, Request $request) {
        $item = \App\Models\Classified::find($id);
        $item->password = '';
        $form = \FormBuilder::create(Classified::class, [
            'method' => 'PUT',
            'model' => $item,
            'url' => action('Admin\ClassifiedsController@update', $id)
        ]);

        return view('admin.classifieds.edit', ['item' => $item,'form' => $form]);
    }

    public function update($id, Request $request) {
        $item = \App\Models\Classified::find($id);
        $form = \FormBuilder::create(Classified::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        $item->title = $values['title'];
        $item->description = $values['description'];
        $item->state = $values['state'];
        $item->contact_phone = $values['contact_phone'];
        $item->contact_name = $values['contact_name'];
        $item->user_id = \Auth::user()->id;
        $item->cep = $values['cep'];
        $item->category_id = $values['category_id'];
        if ($request->hasFile('photo')) {
          $file = $request->file('photo');
          $item->photo_url = $file->move('classifieds', sha1(time()).'.'.$file->extension());
        }

        $item->save();

        \App\Flash::callout('success','Classificado editado com sucesso!', $request);
        return redirect()->back(); 
    }

    public function destroy ($id, Request $request) {
        $comment = \App\Models\Classified::find($id);

        $comment->delete();

        \App\Flash::callout('success','Classificado deletado com sucesso!', $request);
        return redirect()->back(); 
    }
}