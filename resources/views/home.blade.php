@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-md-12">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php $i = 0; ?>
        @foreach($ads as $ad)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}" style="max-height: 400px;">
          <a href="{{ url('/out/'.$ad->id) }}" target="_blank">
            <img class="d-block w-100" src="{{ asset($ad->image_url) }}" alt="First slide">
          </a>
        </div>
        <?php $i++; ?>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
  </div>
  
  @foreach($classifieds as $item)
    @include('widgets.classified', ['item' => $item])
  @endforeach

  @if(count($classifieds) == 0)
    <div class="col text-center">Nenhum classificado encontrado.</div>
  @endif
</div>

@stop