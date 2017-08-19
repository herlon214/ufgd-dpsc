<?php
namespace App\Forms\Admin;

class Ads extends \App\Forms\Form {

  public function buildForm() {
    $this->prepare();

    $this->add('url', 'text')
    ->add('slot', 'select', [
      'choices' => [1, 2, 3, 4, 5, 6, 7, 8]
    ])
    ->add('start_date', 'text', [
      'label' => 'Data de início',
      'rules' => 'required'
    ])
    ->add('end_date', 'text', [
      'label' => 'Data de fim',
      'rules' => 'required'
    ])
    ->add('image_url', 'file', [
      'label' => 'Banner'
    ])
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Enviar'
    ]);
  }
}