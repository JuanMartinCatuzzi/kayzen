@extends('layouts.app')

@section('content')
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Lista de Autos</h1>
      @if (Auth::user()->role == 'ADMIN')

      <p>
        <!-- Button trigger modal Auto -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar
</button>
@if ($errors->any())
  @foreach ($errors->all() as $error)

  <span class="invalid-feedback" role="alert">
      <strong>{{ $error }}</strong>
    @endforeach
  </span>
@endif
@if (Auth::user()->role == 'ADMIN')

<h2 class="jumbotron-heading">Marcas de autos:</h2>
<ul class="list-group">
  @foreach ($marcas as $marca)

  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{$marca->name}}
    <a href="/edit-brand/{{$marca->id}}" class="badge badge-primary badge-pill">Editar</a>
    <a href="/delete-brand/{{$marca->id}}" class="badge badge-primary badge-pill">Eliminar</a>
  </li>

@endforeach
</ul>
@endif

<!-- Modal Auto -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Agregar Marca</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="/add-brand" method="post" class="modal-body">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="name" required>
      </div>
      <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Agregar Marca</button>
</div>
    </form>
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Agregar Auto</h5>
    </div>
    <form action="/add-car" method="post" class="modal-body" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" name="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='description'></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Marca</label>
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
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Agregar Auto</button>
    </div>
  </form>
  </div>
</div>
</div>
      </p>
    @endif
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach ($modelos as $modelo)
          @foreach ($marcas as $marca)
            @if ($modelo->brand_id == $marca->id)

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="/storage/img/{{$modelo->imagen}}" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"/></img>
            <div class="card-body">
              <h2 class="card_text">{{$marca->name}} {{$modelo->name}}</h2>
              <p class="card-text">{{$modelo->description}}</p>
              @if (Auth::user()->role == 'ADMIN')
              <div class="btn-group">
                  <a href="/delete-car/{{$modelo->id}}"><div class="btn btn-sm btn-outline-secondary">Eliminar</div></a>
                  <a href="/edit-car/{{$modelo->id}}"><div class="btn btn-sm btn-outline-secondary">Editar</div></a>
                </div>
              @endif
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
      @endif
        @endforeach
      @endforeach

      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>
@endsection
