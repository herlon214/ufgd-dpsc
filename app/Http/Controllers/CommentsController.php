<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forms\Comment;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class CommentsController extends Controller {

    public function store(Request $request, FormBuilder $formBuilder) {
        $form = $formBuilder->create(Comment::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
  
        $values = $form->getFieldValues();

        $comment = new \App\Models\Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->classified_id = $request->input('classified_id');
        $comment->comment = $request->input('comment');
        $comment->save();

        \App\Flash::callout('success','Comentário criado com sucesso!', $request);

        return redirect()->back(); 
    }

    public function destroy ($id, Request $request) {
        $comment = \App\Models\Comment::find($id);

        if($comment->user_id == \Auth::user()->id) {
            $comment->delete();

            \App\Flash::callout('success','Comentário deletado com sucesso!', $request);
        }

        return redirect()->back(); 
    }
}