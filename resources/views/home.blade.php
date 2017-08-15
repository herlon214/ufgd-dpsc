@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  @for($i = 0; $i < 10; $i++)
  <div class="col-3" style="padding-top: 25px">
    <div class="card">
      <div class="card-body">
        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="https://www.ivihoje.com.br/index.php/produtos/thumbs/arquivos-produtos-imagens-10040.jpg/300/400">
        <h4 class="card-title">Maquina de assar frango</h4>
        <p class="card-text">Pouco uso. Aceito proposta </p>
        <a href="#" class="btn btn-primary btn-block">Abrir classificado <i class="fa fa-external-link"></i></a>
      </div>
    </div>
  </div>
  
  @endfor
</div>

@stop