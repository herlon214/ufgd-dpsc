@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  @foreach($classifieds as $item)
    @include('widgets.classified', ['item' => $item])
  @endforeach
</div>

@stop