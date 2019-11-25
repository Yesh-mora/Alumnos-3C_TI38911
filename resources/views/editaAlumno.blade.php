@extends("plantilla")
@section("modulo") Edicion de Alumno @endSection
@section("contenido")
<form method="POST" action="{{route('alumnos.update',$alumno[0]->matricula)}}">
    @method('PATCH')
    {{ csrf_field()}}<!--Para evitar ataques-->
<div class="row">
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-address-book"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Matrícula" id="matricula" name="matricula" required maxlength="7" value="{{$alumno[0]->matricula}}">
    </div>
        </div>
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-github-alt"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required value="{{$alumno[0]->nombre}}">
    </div>
        </div>
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-github-square"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" required value="{{$alumno[0]->apellidos}}">
    </div>
        </div>
    </div>
<div class="row">
     <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class=" fa fa-at"></i></span>
  </div>
        <input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" required value="{{$alumno[0]->correo}}">
    </div>
        </div>
     <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-graduation-cap"></i></span>
  </div>
        <select id="carrera" name="carrera" class="form-control" required>
            @if($carreras)
            @foreach($carreras as $car)
            @if($car->id==$alumno[0]->carrera)
            <option selected value="{{$car->id}}">{{$car->nombre}}</option>
            @endif
            <option value="{{$car->id }}">{{$car->nombre }}</option>
            @endforeach
            @endif
        </select>
       
    </div>
        </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-dark btn-block">Guardar</button>
    </div>
</div>
</form>

@endSection