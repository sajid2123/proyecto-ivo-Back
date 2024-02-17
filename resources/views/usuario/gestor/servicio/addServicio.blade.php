<!-- bootstrap  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css  -->
<link rel="stylesheet" href="{{ asset('css/gestor.css') }}">
<!-- script javascript  -->
<script type="text/javascript" language="javascript" src="{{ asset('js/servicioFormulario.js') }}"></script>


<div class="container-fluid font">
    <div class="row" >
        <div class="col-2">
            @include('usuario.gestor.nav')
        </div>
        <div class="col-10 p-0">
            <div class="row mt-4">
                <div class="col-12 p-0">
                    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
                </div>
            </div>
            @isset($errors)
            <div class="row mt-4">
                <div class="col-12 px-5">
                    <h1 class="title">Alta Usuario</h1>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                </div>
            </div>
            @endisset
            <div class="row mt-5">
                <div class="col-12 px-5 ">
                    <div class="d-flex">
                       <div class="col-6 d-flex justify-content-center py-2 active-paso" id="paso-barra-1">
                            <span>
                                <i class="fa-solid fa-1 mx-2"></i>
                                Datos del Servicio
                            </span>
                        </div> 
                        <div class="col-6 d-flex justify-content-center py-2 non-active-paso" id="paso-barra-2">
                            <span>
                                <i class="fa-solid fa-2 mx-2"></i>
                                Confirmar Datos
                            </span>
                        </div>  
                    </div>
                </div>
            </div>
        
            <div class="row mt-4">
                <div class="col-12 px-5">
                    <form method="POST" action="{{ route('servicio.crear') }}">
                    @csrf 
                    <div id="paso-1">
                            <div class="row mt-4  ">
                                <div class="col-12">
                                    <span class="titulo-fomulario-add-usuario">Introduce los datos.</span>
                                </div>
                            </div>
                            <div class="row d-flex flex-column align-items-center">
                                <div class="col-4">
                                    <label for="nombre_servicio" class="my-3 label-personalizado">Nombre del Servicio</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"  name="nombre_servicio" id="nombre_servicio" autofocus>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-4">
                                    <label for="fecha_creacion" class="my-3 label-personalizado">Fecha de Creacion</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" class="form-control input-style"  name="fecha_creacion" id="fecha_creacion">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                    </div>
                    
                    <div id="paso-2">
                        <div class="row mt-4">
                            <div class="col-12">
                                <span class="titulo-fomulario-add-usuario">Confirma los datos.</span>
                            </div>
                        </div>
                        <div class="row d-flex flex-column align-items-center">
                                <div class="col-4">
                                    <label for="nombre_servicio" class="my-3 label-personalizado">Nombre del Servicio</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style"   id="nombre_servicio_disabled" disabled>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-4">
                                    <label for="fecha_creacion" class="my-3 label-personalizado">Fecha de Creacion</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" class="form-control input-style"  id="fecha_creacion_disabled" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            <a href="{{route('gestor.servicio')}}" class="btn-cancelar">Cancel</a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a  class="btn-pasos mx-2" id="anterior">Anterior</a>
                            <a  class="btn-pasos mx-2" id="siguiente">Siguiente</a>
                            <input type="submit" class="btn-pasos mx-2" value="Confirmar" id="confirmar">
                        </div>
                    </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
</div>