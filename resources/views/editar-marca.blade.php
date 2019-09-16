@extends('layouts.app')
@section('content')
  <div class="container col-md-4">

  <form action="/edit-brand/{{$marca->id}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1"  value="{{$marca->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>
@endsection
