@extends("plantilla")
@section("modulo") Alumnos @endSection
@section("contenido")
<form method="POST" action="{{url("alumnos")}}">
    {{ csrf_field()}}<!--Para evitar ataques-->
<div class="row">
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-address-book"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Matrícula" id="matricula" name="matricula" required maxlength="11">
    </div>
        </div>
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-github-alt"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
    </div>
        </div>
    <div class="col-md-4">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
    <i class="fa fa-github-square"></i></span>
  </div>
        <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" required>
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
        <input type="email" class="form-control" placeholder="Correo" id="correo" name="correo" required>
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
    @if(session()->get('success'))
    <div class="alert alert-success">
        <li class="fa fa-thumbs-up"></li>
        {{ session()->get('success')}}
    </div><br/>
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger">
        <li class="fa fa-bug"></li>
        {{ session()->get('error')}}
    </div><br/>
    @endif
</form>
<div class="row">
    <div class="col-md-12">
           <div class="table-responsive">
            <table class="table table">
                <thead>
               
                    <th>Matr&iacute;cula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                     <th></th>
                      <th></th>
                </thead>
                <tbody>
                   @if($alumnos)
                   @foreach($alumnos as $alu)
                    <tr>
                        <td>{{$alu->matricula}}</td>
                        <td>{{$alu->nombre}}</td>
                        <td>{{$alu->apellidos}}</td>
                        <td>{{$alu->correo}}</td>
                        <td>{{$alu->car}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{url('alumnos/'.$alu->matricula.'/edit')}}">
                                <li class="fa fa-edit"></li>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('alumnos.destroy', $alu->matricula)}}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <li class="fa fa-trash-alt"></li>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>
</div>

@endSection