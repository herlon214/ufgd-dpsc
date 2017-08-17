<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\Login;
use App\Http\Requests;

class LoginController extends Controller
{
    public function index(FormBuilder $formBuilder, Request $request) {
        $form = $formBuilder->create(Login::class, [
            'method' => 'POST',
            'url' => action('LoginController@login')
        ]);

        return view('login', ['title' => 'Logar no sistema', 'form' => $form]);
    }

    public function login(FormBuilder $formBuilder, Request $request) {
        $form = $formBuilder->create(Login::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        if (\Auth::attempt(['email' => $values['email'], 'password' => $values['password']])) {
            \App\Flash::callout('success', 'Bem vindo de volta <strong>'.\Auth::user()->name.'!</strong>', $request);
            return redirect('/');
        }


        \App\Flash::callout('danger', 'Não foi possível encontrar um usuário com essas credenciais.', $request);
        return redirect()->back()->withInput();;
    }
}
