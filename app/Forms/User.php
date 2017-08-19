<?php
namespace App\Forms;

class User extends Form {

  public function buildForm() {
    $this->add('name', 'text', [
      'rules' => 'required',
      'label' => 'Nome'
    ])
    ->add('email', 'text', [
      'label' => 'E-mail',
      'attr' => [
        'disabled' => 'disabled'
      ]
    ])
    ->add('password', 'password', [
      'label' => 'Senha',
      'attr' => [
        'placeholder' => 'Mantenha em branco e ela não será alterada...'
      ]
    ])
    ->add('phone', 'text', [
      'rules' => 'max:11',
      'label' => 'Telefone'
    ])
    ->add('address', 'text', [
      'rules' => 'max:255',
      'label' => 'Endereço'
    ])
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Enviar'
    ]);
  }
}