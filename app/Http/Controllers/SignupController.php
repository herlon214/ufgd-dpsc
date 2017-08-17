<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\Signup;
use App\Http\Requests;

class SignupController extends Controller {

    public function index(FormBuilder $formBuilder) {
        $form = $formBuilder->create(Signup::class, [
            'method' => 'POST',
            'url' => route('signup.store')
        ]);

        return view('signup', ['title' => 'Cadastro', 'form' => $form]);
    }

    public function store(FormBuilder $formBuilder, Request $request) {
        $form = $formBuilder->create(Signup::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();

        // Verifica se o usuário está cadastrado
        $user = \App\User::where('email', '=', $values['email'])->count();

        if($user > 0) {
            \App\Flash::callout('danger', 'Um usuário já está cadastrado com esse e-mail', $request);
            return redirect()->back()->withInput();
        }
        
        
        $user = new \App\User();
        $user->name = $values['name'];
        $user->email = $values['email'];
        $user->password = bcrypt($values['password']);

        if($user->save()) {
            \App\Flash::callout('success', 'Cadastro efetuado com sucesso, bem vindo '. $user->name . '!', $request);
            \Auth::login($user);
            return redirect('/');
        }
    }
}
