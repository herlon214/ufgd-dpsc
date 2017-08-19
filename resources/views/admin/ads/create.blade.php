@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item"><a href="{{ url(action('Admin\AdsController@index')) }}">Publicidades</a></li>
      <li class="breadcrumb-item active">Nova publicidade</li>
    </ol>
    <h2>Nova publicidade</h2>
    {!! form($form) !!}
  </div>
</div>


@stop