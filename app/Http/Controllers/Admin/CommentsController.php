<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Forms\Comment;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class CommentsController extends \App\Http\Controllers\Controller {
    
    public function construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $comments = \App\Models\Comment::with('User')->with('Classified')->get();

        return view('admin.comments.index', ['items' => $comments]);
    }

    public function show($id) {
        $item = \App\Models\Comment::find($id);

        return view('admin.comments.show', ['item' => $item]);
    }

    public function edit($id, Request $request) {
        $item = \App\Models\Comment::find($id);
        $form = \FormBuilder::create(Comment::class, [
            'method' => 'PUT',
            'model' => $item,
            'url' => action('Admin\CommentsController@update', $id)
        ]);

        return view('admin.comments.edit', ['item' => $item,'form' => $form]);
    }

    public function update($id, Request $request) {
        $item = \App\Models\Comment::find($id);
        $form = \FormBuilder::create(Comment::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        $item->user_id = \Auth::user()->id;
        $item->classified_id = $request->input('classified_id');
        $item->comment = $request->input('comment');
        $item->save();

        \App\Flash::callout('success','Comentário criado com sucesso!', $request);
        return redirect()->back(); 
    }

    public function destroy ($id, Request $request) {
        $comment = \App\Models\Comment::find($id);

        $comment->delete();

        \App\Flash::callout('success','Comentário deletado com sucesso!', $request);
        return redirect()->back(); 
    }
}