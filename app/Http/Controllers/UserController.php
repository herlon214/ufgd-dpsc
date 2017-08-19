<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\User;
use App\Http\Requests;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit($id, Request $request) {
        $user = \Auth::user();
        $user->password = '';

        $form = \FormBuilder::create(User::class, [
            'model' => $user,
            'method' => 'PUT',
            'url' => action('UserController@update', $user->id)
        ]);

        return view('user.edit', ['form' => $form]);
    }

    public function update($id, Request $request) {
        $form = \FormBuilder::create(User::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();
        $user = \App\User::find(\Auth::user()->id);
        if($values['password'] !== '') {
            $user->password = bcrypt($values['password']);
        } 
        $user->name = $values['name'];
        $user->phone = $values['phone'];
        $user->address = $values['address'];

        $user->save();
        \App\Flash::callout('success', 'Informações atualizadas com sucesso!', $request);

        return redirect()->back();
    }

    public function destroy($id, Request $request) {
        $user = \App\User::find(\Auth::user()->id);
        
        $user->delete();
        \Auth::logout();

        \App\Flash::callout('success', 'Conta apagada com sucesso!', $request);

        return redirect('/');
    }
}
