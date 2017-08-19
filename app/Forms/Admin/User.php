<?php
namespace App\Forms\Admin;

class User extends \App\Forms\Form {

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
    ->add('is_admin', 'select', [
      'choices' => ['0' => 'Não', '1' => 'Sim'],
      'label' => 'É administrador?'
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