@extends('layout')

@section('content')

<!-- Classificados -->
<div class="col-12">
  <h2>Editar informações da conta</h2>
  <form action="{{ url(action('UserController@destroy', \Auth::user()->id)) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
    <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Você tem certeza?');">Apagar conta</button>
  </form>
  <br>
  {!! form($form) !!}
</div>  

@stop