@extends('layout')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Admin</a></li>
  <li class="breadcrumb-item"><a href="{{ url(action('Admin\CommentsController@index')) }}">Comentários</a></li>
  <li class="breadcrumb-item active">Visualizando comentário #{{ $item->id }}</li>
</ol>
<h2>Comentário #{{ $item->id }}</h2>

<strong>Comentário:</strong> {!! nl2br($item->comment) !!}
@stop