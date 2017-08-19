<?php
namespace App\Forms;

class Comment extends Form {

  public function buildForm() {
    $this->add('comment', 'textarea', [
      'rules' => 'required',
      'label' => ' ',
      'attr' => [
        'placeholder' => "Digite seu comentário aqui...",
        'cols' => "30",
        'rows' => "10"
      ]
    ])
    ->add('classified_id', 'hidden')
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Enviar'
    ]);
  }
}