<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form as FormBuilder;

class Form extends FormBuilder {
  public function prepare() {
    // Spoofing
    if($this->formOptions['method'] == 'PUT' || $this->formOptions['method'] == 'PATCH' || $this->formOptions['method'] == 'DELETE') {
      $this->add('_method', 'hidden', ['value' => $this->formOptions['method']]);
      $this->formOptions['method'] = 'POST';
    }

    // Id
    if($this->getModel()) {
      if($this->getModel()->id) {
        $this->add('id', 'hidden', ['value' => $this->getModel()->id]);
      }
    }


  }
}