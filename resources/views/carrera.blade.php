@extends("plantilla")
@section("modulo") carrera @endSection
@section("contenido")
<form method="POST" action="{{url("carrera")}}">
    {{ csrf_field()}}<!--Para evitar ataques-->
    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        
               
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-github-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
            </div>
        </div>
        

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

                <th>id</th>
                <th>Nombre</th>
                
                <th></th>
                <th></th>
                </thead>
                <tbody>
                    @if($camino)
                    @foreach($camino as $carr)
                    <tr>
                        <td>{{$carr->id}}</td>
                        <td>{{$carr->nombre}}</td>
                        
                        <td>
                            <a class="btn btn-warning" href="{{url('carrera/'.$carr->id.'/edit')}}">
                                <li class="fa fa-edit"></li>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('carrera.destroy', $carr->id)}}" method="post">
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


