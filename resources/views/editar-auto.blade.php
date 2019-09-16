@extends('layouts.app')
@section('content')
  <div class="container col-md-4">

  <form action="/edit-car/{{$modelo->id}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1"  value="{{$modelo->name}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select class="form-control" id="exampleFormControlSelect1" name="brand">
      @foreach ($marcas as $marca)
      <option value="{{$marca->name}}">{{$marca->name}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Imagen</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="car_img">
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>
@endsection
