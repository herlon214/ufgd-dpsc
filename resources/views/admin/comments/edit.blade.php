@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item"><a href="{{ url(action('Admin\CommentsController@index')) }}">Comentários</a></li>
      <li class="breadcrumb-item active">Editando comentário #{{ $item->id }}</li>
    </ol>
    <h2>Editar comentário</h2>
    {!! form($form) !!}
  </div>
</div>


@stop