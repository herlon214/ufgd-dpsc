@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <h2>Editando: {{ $classified->title }}</h2>

    {!! form($form) !!}
  </div>
</div>


@stop