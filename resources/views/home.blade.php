@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  @foreach($classifieds as $item)
    @include('widgets.classified', ['item' => $item])
  @endforeach

  @if(count($classifieds) == 0)
    <div class="col text-center">Nenhum classificado encontrado.</div>
  @endif
</div>

@stop