@extends('admin.template')

@section('header')
<h1>
  {{ $model->toString() }}
</h1>
@endsection

@section('content')
<div class="box box-info">
  <div class="box-body">
    {!! form($form) !!}
  </div>
</div>
@endsection
