@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <h2>Meus classificados <a href="{{ url(action('ClassifiedsController@create')) }}" class="btn btn-success pull-right" data-toggle="tooltip" title="Criar novo classificado"><i class="fa fa-plus"></i> Novo</a></h2>
    <br>

    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Título</th>
          <th>Estado</th>
          <th>Telefone de contato</th>
          <th>Pessoa para contato</th>
          <th>Criado em</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($classifieds as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->title }}</td>
          <td>{{ $item->state }}</td>
          <td>{{ $item->contact_phone }}</td>
          <td>{{ $item->contact_name }}</td>
          <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
          <td class="text-center">
            <form action="{{ url(action('ClassifiedsController@destroy', $item->id)) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <a href="{{ url(action('ClassifiedsController@show', $item->id)) }}" class="btn btn-info" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
              <a href="{{ url(action('ClassifiedsController@edit', $item->id)) }}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
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