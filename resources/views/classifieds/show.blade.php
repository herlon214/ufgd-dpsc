@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <br>
    <h1>{{ $classified->title }} 
      @if(\Auth::user()) <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#reportModal"><i class="fa fa-flag"></i> Reportar</a> @endif
    </h1>
    <small>Criado em {{ date('d/m/Y', strtotime($classified->created_at )) }} às {{ date('H:i:s', strtotime($classified->created_at )) }}</small>
    <br>

    <div class="row">
      <div class="col-md-6">
        <p>{!! nl2br($classified->description) !!}</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="{{ asset($classified->photo_url) }}" width="400" class="rounded mw-100" alt="">
      </div>
    </div>
    
    

    <br>
    <strong>Entrar em contato com <u>{{ $classified->contact_name }}</u> pelo telefone <u>{{ $classified->contact_phone }}</u></strong>

    <br><br>
    <h2>Comentários</h2>
    <hr />
    @include('widgets.comment', ['classified' => $classified, 'form' => $comment_form])
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form method="POST" action="{{ action('DenounceController@store') }}">
  {{ csrf_field() }}
  <input type="hidden" name="classified_id" value="{{ $classified->id }}" />
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportModalTitle">Reportar classificado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Em que categoria o classificado atual <u>{{ $classified->title }}</u> se encaixa?</p>

        <div class="form-group">
          <select class="form-control" id="category" name="denounce_category">
            @foreach($denounce_categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Reportar</button>
      </div>
    </div>
  </div>
  </form>
</div>

@stop