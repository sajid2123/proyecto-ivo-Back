<!-- bootstrap  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css  -->
<link rel="stylesheet" href="{{ asset('css/gestor.css') }}">

<div class="container-fluid p-0 font">
    <div class="row">
        <div class="col-2 p-0">
            @include('usuario.gestor.nav')
        </div>
        <div class="col-10 p-0 px-5">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h1 class="title">Modificar Usuario</h1>
                </div>
                <div class="col-12">
                    <p class="sub-title-modificar-servicio">Introduce los nuevos datos</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                @isset($usuario)
                        <form action="">
                            <div class="row">
                                <div class="col-4">
                                    <label for="dni" class="my-3 label-personalizado">DNI</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="dni" id="dni" value="{{ $usuario->dni }}" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="nombre" class="my-3 label-personalizado">Nombre</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="nombre" id="nombre" value="{{  $usuario->nombre }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="apellido1" class="my-3 label-personalizado">Primer Apellido</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="apellido1" id="apellido1"  value="{{  $usuario->spellido1 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="apellido2" class="my-3 label-personalizado">Segundo Apellido</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="apellido2" id="apellido2"  value="{{  $usuario->apellido2 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="nombre" class="my-3 label-personalizado">Rol</label>
                                    <div class="form-group">
                                        <select class="form-group" id="rol" name="rol">
                                            
                                            @foreach($rols as $rol)
                                                <option value="{{$rol->nombre}}">{{$rol->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-4">
                                    <label for="apellido1" class="my-3 label-personalizado">Servicio</label>
                                    <div class="form-group">
                                        <select class="form-group" name="servicio" id="servicio">
                                            @foreach($servicios as $servicio)
                                                <option value="{{$servicio->nombre_servicio}}">{{$servicio->nombre_servicio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="dni" class="my-3 label-personalizado">Sexo</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-group" id="sexo" name="sexo">
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="correo" class="my-3 label-personalizado">Correo</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" class="form-control input-style" name="correo" id="correo"  value="{{  $usuario->correo }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="codigoPostal" class="my-3 label-personalizado">Código Postal</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="codigoPostal" id="codigoPostal"  value="{{  $usuario->codigo_postal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="direccion" class="my-3 label-personalizado">Dirección</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="direccion" id="direccion"  value="{{  $usuario->direccion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="fechaNac" class="my-3 label-personalizado">Fecha Nacimiento</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" class="form-control input-style"  name="fechaNac" id="fechaNac"  value="{{  $usuario->fecha_nacimiento }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="telefono" class="my-3 label-personalizado">Telefono</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="telefono" id="telefono"  value="{{  $usuario->codigo_postal }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
                    