@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active"><a href="{{ url(action('Admin\AdsController@index')) }}">Publicidades</a></li>
    </ol>
    
    <h2>Publicidades <a href="{{ url(action('Admin\AdsController@create')) }}" class="btn btn-success pull-right">Nova</a></h2>
    <br>

    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Posição</th>
          <th>Url</th>
          <th>Começa em</th>
          <th>Termina em</th>
          <th>Cliques</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->slot + 1 }}</a></td>
          <td><a href="{{ $item->url }}">{{ $item->url }}</a></td>
          <td>{{ date('d/m/Y H:i:s', strtotime($item->start_date)) }}</td>
          <td>{{ date('d/m/Y H:i:s', strtotime($item->end_date)) }}</td>
          <td>{{ count($item->hits) }}</td>
          <td class="text-center">
            <form action="{{ url(action('Admin\AdsController@destroy', $item->id)) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <a href="{{ url(action('Admin\AdsController@show', $item->id)) }}" class="btn btn-info" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
              <a href="{{ url(action('Admin\AdsController@edit', $item->id)) }}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
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