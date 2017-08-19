<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Forms\Admin\User;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class UsersController extends \App\Http\Controllers\Controller {
    
    public function construct() {
        $this->middleware('auth');
    }

    public function index() {
        $comments = \App\User::get();

        return view('admin.users.index', ['items' => $comments]);
    }

    public function show($id) {
        $item = \App\User::find($id);

        return view('admin.users.show', ['item' => $item]);
    }

    public function edit($id, Request $request) {
        $item = \App\User::find($id);
        $item->password = '';
        $form = \FormBuilder::create(User::class, [
            'method' => 'PUT',
            'model' => $item,
            'url' => action('Admin\UsersController@update', $id)
        ]);

        return view('admin.users.edit', ['item' => $item,'form' => $form]);
    }

    public function update($id, Request $request) {
        $item = \App\User::find($id);
        $form = \FormBuilder::create(User::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        if($values['password'] !== '') {
            $item->password = bcrypt($values['password']);
        } 
        $item->is_admin = $values['is_admin'];
        $item->name = $values['name'];
        $item->phone = $values['phone'];
        $item->address = $values['address'];

        $item->save();

        \App\Flash::callout('success','Usuário editado com sucesso!', $request);
        return redirect()->back(); 
    }

    public function destroy ($id, Request $request) {
        $comment = \App\User::find($id);

        $comment->delete();

        \App\Flash::callout('success','Usuário deletado com sucesso!', $request);
        return redirect()->back(); 
    }
}