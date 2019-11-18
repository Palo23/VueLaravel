@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-0">
                
            <div class="container">
                    <h5 class="card-header">{{$curso->nombre}}</h5>
                <br>
                    <label for=""><h3>Publicar</h3></label>
                    <form class="form-group" action="{{ route('subirArchivo') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div>
                            <label for="">Título:</label>
                            <input type="hidden" id="idCurso" name="idCurso" value="{{$curso->id}}">
                            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título de la publicación">
                            <label for="">Publicación:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                            <label for="">Archivo:</label>
                            <input class="form-control" type="file" name="file-cur" accept=".jpg, .jpeg, .png, .doc, .docx, .pdf, .odt"> 
                        </div>
                        <div class="py-2">
                            <button type="submit" class="btn btn-primary btn-lg">Publicar</button>
                        </div>
                    </form>
            </div>

            <div class="container">
                <label for=""><h3>Publicaciones</h3></label>
                    <div class="container">
                            <ul class="list-unstyled">
                                    <li class="media">
                                      <img src="..." class="mr-3" alt="...">
                                      <div class="media-body">
                                        <h5 class="mt-0 mb-1">List-based media object</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                      </div>
                                    </li>
                                    <li class="media my-4">
                                      <img src="..." class="mr-3" alt="...">
                                      <div class="media-body">
                                        <h5 class="mt-0 mb-1">List-based media object</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                      </div>
                                    </li>
                                    <li class="media">
                                      <img src="..." class="mr-3" alt="...">
                                      <div class="media-body">
                                        <h5 class="mt-0 mb-1">List-based media object</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                      </div>
                                    </li>
                                  </ul>
                    </div>
            </div>
            
        </div>

        <div class="col-md-6 offset-0">

            <div class="card">
            <h5 class="card-header">Alumnos inscritos al curso {{$curso->nombre}}</h5>
                <div class="col-md-12 col-xs-12">
                    <div class="row" style="width: auto; margin: auto auto;">
                        <div class="col-md-4">
                    
                        @auth
                            @if (Auth::user()->id === $curso->id_user)
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($inscritos as $usuarios)
                                <tr>
                                    <th>
                                    <p>{{$usuarios->name}}</p>
                                    </th>
                                    <td>{{$usuarios->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                            @endif
                        @endauth
                    </div>   
                    <div class="col-md-7">
                        <p>
                        </p>
                        <br>
                    </div>
                    </div>
                </div>
              </div>
        </div>

    </div>
</div>
@endsection
