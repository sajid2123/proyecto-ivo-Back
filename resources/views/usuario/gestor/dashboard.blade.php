<!-- bootstrap  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css  -->
<link rel="stylesheet" href="{{ asset('css/gestor.css') }}">
<!-- dataTables link -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<div class="container-fluid p-0 font colors">
@if(session('success'))
                <div class="modal-backdrop fade show"></div>
            @endif
        
            <div class="modal fade {{ session('success') ? ' show d-block' : '' }}" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-modal="true" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-body rounded-3">
                        <div class="row modal-header-personalizado">
                            <i class="fa-solid fa-circle-check modal-icon"></i>
                        </div>
                        <div class="row modal-body">
                            @if(session('success'))
                                <p>{{ session('success') }}</p>
                            @endif
                        </div>
                        <div class="row modal-footer-personalizado">
                            <a href="{{ route('gestor.usuario')}}">Cerrar</a>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class="col-2 p-0">
            @include('usuario.gestor.nav')
        </div>
        <div class="col-10 p-0 px-5">
            <div class="row mt-4">
                <div class="col-12">
                    <h1 class="title">Usuarios</h1>
                </div>
            </div>
            <div class="row mt-3 px-2">
                <div class="col-6 p-0">
                <form method="GET" action="" class="m-0">
                    <select name="tipo_usuario" class="select" onchange="this.form.submit()">
                        <option value="Médico" {{ $tipo_usuario == 'Médico' ? 'selected' : '' }}>Médico</option>
                        <option value="Radiólogo" {{ $tipo_usuario == 'Radiólogo' ? 'selected' : '' }}>Radiólogo</option>
                        <option value="Gestor" {{ $tipo_usuario == 'Gestor' ? 'selected' : '' }}>Gestor</option>
                        <option value="Administrativo" {{ $tipo_usuario == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                    </select>
                </form>
                </div>
                <div class="col-6 d-flex justify-content-end p-0">
                    <a href="{{route('gestor.add-usuario')}}" class="btn-add-user py-0">Alta Usuario</a>
                </div>
            </div>
          
            <div class="row mt-5">
                <div class="col-12">
                    <table class="table table-hover" id="usuarios-table">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->dni }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido1 . " " .  $usuario->apellido2}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('usuario.perfil' , ['id' => $usuario->id_usuario])}}">
                                            <i class="fa-solid fa-eye color"></i>
                                        </a>
                                        <a href="{{ route('usuario.edit' , ['id' => $usuario->id_usuario])}}">
                                            <i class="fa-solid fa-pen-to-square mx-3 color"></i>
                                        </a>
                                        <!-- <form action="{{ route('usuario.destroy', ['id' => $usuario->id_usuario]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="color delete-btn-style">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var dtOptions = {
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
                emptyTable: ''
            },
            pagingType: "numbers",
            info: false
        };
        new DataTable('#usuarios-table', dtOptions);
</script>

