@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-xs-12">
    <h1>{{ $classified->title }} </h1>
    <small>Criado em 16/08/2017 às 15:54</small>
    <br>

    <p>{!! nl2br($classified->description) !!}</p>

    <br>
    <h4>Entrar em contato com <u>{{ $classified->contact_name }}</u> pelo telefone <u>{{ $classified->contact_phone }}</u></h4>
  </div>
  
</div>

@stop