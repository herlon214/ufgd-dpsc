<?php
namespace App\Forms;

class Signup extends Form {

  public function buildForm() {
    $this->add('name', 'text', [
      'rules' => 'required',
      'label' => 'Nome'
    ])
    ->add('email', 'text', [
      'rules' => 'required|email',
      'label' => 'E-mail'
    ])
    ->add('password', 'password', [
      'rules' => 'required|min:5',
      'label' => 'Senha'
    ])
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Enviar'
    ]);
  }
}