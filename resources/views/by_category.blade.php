@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <h2>Classificados da categoria <u>{{ $category->name }}</u></h2>
  @foreach($classifieds as $item)
  <div class="col-3" style="padding-top: 25px">
    <div class="card">
      <div class="card-body">
        <img class="card-img-top" style="height: 180px; width: 100%; display: block;" src="https://www.ivihoje.com.br/index.php/produtos/thumbs/arquivos-produtos-imagens-10040.jpg/300/400">
        <h4 class="card-title">{{ $item->title }}</h4>
        <p class="card-text">{{ str_limit($item->description, 100) }}</p>
        <a href="{{ url('/classificados/'.$item->id) }}" class="btn btn-primary btn-block">Abrir classificado <i class="fa fa-external-link"></i></a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@stop