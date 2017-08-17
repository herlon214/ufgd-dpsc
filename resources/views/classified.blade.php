@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <br>
    <h1>{{ $classified->title }} <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#reportModal"><i class="fa fa-flag"></i> Reportar</a> <a href="#" class="btn btn-info"><i class="fa fa-share-alt"></i> Compartilhar</a></h1>
    <small>Criado em 16/08/2017 às 15:54</small>
    <br>

    <div class="row">
      <div class="col-6">
        <p>{!! nl2br($classified->description) !!}</p>
      </div>
      <div class="col-6 text-center">
        <img src="{{ asset($classified->photo_url) }}" width="400" class="class="rounded"" alt="">
      </div>
    </div>
    
    

    <br>
    <strong>Entrar em contato com <u>{{ $classified->contact_name }}</u> pelo telefone <u>{{ $classified->contact_phone }}</u></strong>

    <br><br>
    <h2>Comentários</h2>
    <hr />
    @include('widgets.comment', ['classified_id' => $classified->id])
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Reportar</button>
      </div>
    </div>
  </div>
</div>

@stop