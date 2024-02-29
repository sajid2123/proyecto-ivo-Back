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


<div class="container-fluid p-0 font">
    <div class="row">
        <div class="col-2 p-0">
            @include('usuario.gestor.nav')
        </div>
        <div class="col-10 p-0 px-5">
            <div class="row mt-4">
                <div class="col-12">
                    <h1 class="title color">Servicios</h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('gestor.add-servicio')}}" class="btn-add-servicio">Alta Servicio</a>
                </div>
            </div>
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
                            <a href="{{ route('gestor.servicio')}}">Cerrar</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <table class="table table-hover" id="servicios-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha creación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicios as $servicio)
                                <tr>
                                    <td>{{ $servicio->nombre_servicio }}</td>
                                    <td>{{ $servicio->fecha_creacion }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('servicio.edit' , ['id' => $servicio->id_servicio])}}">
                                            <i class="fa-solid fa-pen-to-square mx-3 color"></i>
                                        </a>
                                        <!-- <form action="{{ route('usuario.destroy', ['id' => $servicio->id_servicio]) }}" method="POST">
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
        new DataTable('#servicios-table', dtOptions);
</script>
