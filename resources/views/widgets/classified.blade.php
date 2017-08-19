<div class="col-md-3" style="padding-top: 25px;">
  <div class="card">
    <div class="card-body">
      <img class="card-img-top mw-100 rounded" style="height: 180px; width: 100%; display: block;" src="{{ asset($item->photo_url) }}">
      <h4 class="card-title">{{ $item->title }}</h4>
      <p class="card-text">{{ str_limit($item->description, 100) }}</p>
      <a href="{{ url('/classificados/'.$item->id) }}" class="btn btn-primary btn-block">Abrir classificado <i class="fa fa-external-link"></i></a>
    </div>
  </div>
</div>