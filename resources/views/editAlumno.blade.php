@extends("plantilla")
@section("modulo") Alumnos @endSection
@section("contenido")
<form method="post" action="{{ route('alumnos.update',$alumno[0]->matricula)}}">
    @method('PATCH')
    {{csrf_field()}}
<div class="row">
    <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-users"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" aria-label="matricula" aria-describedby="basic-addon1" required maxlength="7" value="{{ $alumno[0]->matricula }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-user-alt"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" aria-label="nombre" aria-describedby="basic-addon1" required value="{{ $alumno[0]->nombre }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-user-friends"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" aria-label="apellidos" aria-describedby="basic-addon1" required value="{{ $alumno[0]->apellido }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-mail-bulk"></i>
                </span>
            </div>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" aria-label="correo" aria-describedby="basic-addon1" required value="{{ $alumno[0]->correo }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-address-book"></i>
                </span>
            </div>
            <select class="form-control" id="carrera" name="carrera">
                @if($carreras)
                @foreach($carreras as $car)
                @if (car->id == $alumno[0]->carrera)
                <option selected value="{{$car->id}}" required>{{$car->nombre}}</option>
                @endif
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-dark btn-block">Guardar</button>
    </div>
</div>
    @if(sesion()->get('success'))
    <div class="alert alert-success">
        <li class="fa fa-thumbs-up"></li>
        {{session()->get('success')}}
    </div><br />
    @endif
</form>
@endSection





