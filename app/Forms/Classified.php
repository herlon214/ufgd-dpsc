<?php
namespace App\Forms;

class Classified extends Form {

  public function buildForm() {
    $this->prepare();
    
    $categories = \App\Models\ClassifiedCategory::getAll()->toArray();
    $categories = array_pluck($categories, 'name', 'id');

    $this->add('title', 'text', [
      'rules' => 'required',
      'label' => 'Título'
    ])
    ->add('photo', 'file', [
      'label' => 'Foto'
    ])
    ->add('category_id', 'select', [
      'choices' => $categories,
      'label' => 'Categoria'
    ])
    ->add('description', 'textarea', [
      'rules' => 'required',
      'label' => 'Descrição'
    ])
    ->add('state', 'text', [
      'rules' => 'required|max:2',
      'label' => 'Sigla do estado (ex: MS)'
    ])
    ->add('cep', 'text', [
      'rules' => 'required|max:8',
      'label' => 'CEP (ex: 79740000)'
    ])
    ->add('contact_phone', 'text', [
      'rules' => 'required|max:11',
      'label' => 'Telefone para contato (ex: 67996606804)'
    ])
    ->add('contact_name', 'text', [
      'label' => 'Falar com'
    ])
    ->add('submit', 'submit', [
      'attr' => ['class' => 'btn btn-success'],
      'label' => 'Enviar'
    ]);
  }
}