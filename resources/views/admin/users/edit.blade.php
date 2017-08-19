@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item"><a href="{{ url(action('Admin\UsersController@index')) }}">Usuários</a></li>
      <li class="breadcrumb-item active">Editando usuário #{{ $item->id }}</li>
    </ol>
    <h2>Editar usuário</h2>

    {!! form($form) !!}
  </div>
</div>


@stop