@extends('layout')

@section('content')

<!-- Classificados -->
<div class="col-12">
  <div class="col-12">
    <h2>Pesquisando por: <u>{{ $search }}</u></h2>

    <div class="row">
      @foreach($classifieds as $item)
        @include('widgets.classified', ['item' => $item])
      @endforeach
    </div>
    

    @if(count($classifieds) == 0)
    <div class="text-center"><br><br>Não encontramos nenhum classificado com seu critério de pesquisa.</div>
    @endif
  </div>
</div>  

@stop