@extends('layout')

@section('content')

<!-- Classificados -->
<div class="row">
  <div class="col-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active"><a href="{{ url(action('Admin\UsersController@index')) }}">Usuários</a></li>
    </ol>
    <h2>Usuários</h2>
    <br>

    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Admin</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->phone }}</td>
          <td>@include('widgets.boolean', ['data' => $item->is_admin])</td>
          <td class="text-center">
            <form action="{{ url(action('Admin\UsersController@destroy', $item->id)) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <a href="{{ url(action('Admin\UsersController@edit', $item->id)) }}" class="btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>
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