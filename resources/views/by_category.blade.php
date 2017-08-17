@extends('layout')

@section('content')

<!-- Classificados -->
<div class="col-12">
  <h2>Classificados da categoria <u>{{ $category->name }}</u></h2>

  @foreach($classifieds as $item)
    @include('widgets.classified', ['item' => $item])
  @endforeach

  @if(count($classifieds) == 0)
  <div class="text-center">Essa categoria ainda não possui classificados.</div>
  @endif
</div>  

@stop