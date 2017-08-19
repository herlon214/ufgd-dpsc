<?php
namespace App\Forms;

class Interest extends Form {

  public function buildForm() {
    $categories = \App\Models\ClassifiedCategory::getAll()->toArray();
    $categories = array_pluck($categories, 'name', 'id');

    $this->add('categories[]', 'select', [
      'choices' => $categories,
      'label' => 'Selecione as categorias',
      'attr' => ['multiple' => 'multiple']
    ])
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Salvar'
    ]);
  }
}