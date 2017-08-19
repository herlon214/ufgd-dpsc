@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active"><a href="{{ url(action('Admin\CommentsController@index')) }}">Comentários</a></li>
    </ol>
    
    <h2>Comentários</h2>
    <br>

    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Usuário</th>
          <th>Classificado</th>
          <th>Comentário</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td><a href="{{ url(action('ClassifiedsController@show', $item->user->id)) }}">{{ $item->user->name }}</a></td>
          <td><a href="{{ url(action('ClassifiedsController@show', $item->classified->id)) }}">{{ $item->classified->title }}</a></td>
          <td>{{ $item->comment }}</td>
          <td class="text-center">
            <form action="{{ url(action('Admin\CommentsController@destroy', $item->id)) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <a href="{{ url(action('Admin\CommentsController@show', $item->id)) }}" class="btn btn-info" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
              <a href="{{ url(action('Admin\CommentsController@edit', $item->id)) }}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza?');" data-toggle="tooltip" title="Apagar"><i class="fa fa-times"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>


@stop