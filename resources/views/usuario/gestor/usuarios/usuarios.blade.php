<!-- bootstrap  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css  -->
<link rel="stylesheet" href="{{ asset('css/gestor.css') }}">
<!-- dataTables link -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<style>
h1 {
    color:  #092C4C;
}

#opciones {
    font-size: 18px;
    padding: 8px;
    width: 220px;
    border-radius: 10px;
    background-color: #092C4C;
    color: #fff;
}

#opciones option {
    background-color: #fff;
    color: #092C4C;
}

.table thead th {
    background-color: #092C4C;
    color: #ffffff;
    vertical-align: middle;
}

.table tbody tr,
.table thead tr {
    height: 50px;
}

.table tbody {
    color: #092C4C;
}

.table tbody tr td,
.table thead tr th {
    vertical-align: middle;
}

.table-bordered td:not(:last-child),
.table-bordered th:not(:last-child) {
    border-right: none;
}

</style>

<div class="container-fluid p-0 font">
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
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-start">
                    <select name="opciones" id="opciones">
                        <option value="todo">Medico</option>
                        <option value="completado">Radiologos</option>
                        <option value="noCompletado">Administrativo</option>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('crear-donacion')}}" class="btn-add-rol">Crear Usuario</a>
                </div>
            </div>
            @if(session('success'))
            <div class="modal-backdrop fade show"></div>
            @endif

            <div class="modal fade  mt-5 {{ session('success') ? ' show d-block' : '' }}" id="successModal"
                tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-modal="true" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header-personalizado modal-style">
                            <i class="fa-solid fa-circle-check modal-icon"></i>
                        </div>
                        <div class="modal-body  modal-style">
                            @if(session('success'))
                            <p>{{ session('success') }}</p>
                            @endif
                        </div>
                        <div class="modal-footer-personalizado modal-style">
                            <a href="{{ route('gestor.rol')}}">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <table class="table table-bordered" id="donaciones-table">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#opciones').val('todo'); 
    cargarDonaciones(); 

    $('#opciones').change(cargarDonaciones);
});

function cargarDonaciones() {
    const opcionSeleccionada = $('#opciones').val();
    let url;

    url="http://localhost:8000/api/v1/usuarios";
        fetch(url)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#donaciones-table tbody');
            tbody.innerHTML = ''; 

            data.results.forEach(usuario => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', usuario.idUsuario); 
                row.innerHTML = `
                    <td>${usuario.dni}</td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <i class="fa-solid fa-eye fa-lg me-3"></i>
                        <i class="fa-solid fa-pen-to-square fa-lg me-3"></i>
                        <i class="fa-solid fa-trash delete-donacion fa-lg"></i>
                    </td>
                    `;
                tbody.appendChild(row);
            });

            $('#donaciones-table').DataTable({
                lengthMenu: [10, 25, 50, 75, 100],
                lengthChange: false,
                retrieve: true,
                paging: true,
                pageLength: 10 
            });
        });
}

function eliminarDonacion(idDonacion) {
    fetch(`http://localhost:8000/api/v1/eliminar-donacion/${idDonacion}`, {
            method: 'DELETE',
        })
        .then(response => {
            if (response.ok) {
                const filaAEliminar = $(`#donaciones-table tbody tr[data-id="${idDonacion}"]`);
                console.log('Fila a eliminar:', filaAEliminar); 
                filaAEliminar.remove();
            } else {
                console.error('Error al eliminar la donación');
            }
        });
}

function verDonacion(idDonacion) {
    window.location.href = `{{ route('datos-donacion') }}?id=${idDonacion}`;
}

function editarDonacion(idDonacion) {
    window.location.href = `{{ route('editar-donacion') }}?id=${idDonacion}`;
}
</script>