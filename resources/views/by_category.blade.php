@extends('layout')

@section('content')

<!-- Classificados -->
<div class="col-12">
  <div class="col-12">
    <h2>Classificados da categoria <u>{{ $category->name }}</u></h2>

    <div class="row">
      @foreach($classifieds as $item)
        @include('widgets.classified', ['item' => $item])
      @endforeach
    </div>
    

    @if(count($classifieds) == 0)
    <div class="text-center"><br><br>Essa categoria ainda não possui classificados.</div>
    @endif
  </div>
</div>  

@stop