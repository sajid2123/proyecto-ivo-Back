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
#opciones {
    font-size: 100%;
    padding: 0.5%;
    width: 15%;
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

h1 {
    color: #092C4C;
}

.modal-content {
    background-color: #EBF3FA !important;
}


.custom-modal-footer {
  display: flex;
  padding: 10px;
}

#btnSi {
    background-color: #092C4C;
    width: 30%;
    height: 40px;
    border-radius: 10px;
    margin-left: 10%;
    color: #EBF3FA;
    margin-bottom: 3%;
}

#btnNo {
    background-color: inherit;
    width: 30%;
    margin-left: 15%;
    border-radius: 10px;
    color: #092C4C;
    margin-bottom: 3%
}

#modalTitle {
    margin: 7%;
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
                    <h1 class="title">Donaciones</h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-start">
                    <select name="opciones" id="opciones">
                        <option value="todo">Todo</option>
                        <option value="completado">Completado</option>
                        <option value="noCompletado">No completado</option>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('crear-donacion')}}" class="btn-add-rol">Crear Donacion</a>
                </div>
            </div>
            @if(session('success'))
            <div class="modal-backdrop fade show"></div>
            @endif

            <div class="modal fade  mt-2 {{ session('success') ? ' show d-block' : '' }}" id="successModal"
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
                                <th>Titulo</th>
                                <th>Cantidad donada</th>
                                <th>Objetivo</th>
                                <th>Estado</th>
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
<div class="modal" tabindex="-1" id="confirmDeleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <h4 id="modalTitle">¿Estás seguro de que quieres dar de baja la donación?</h4>
      <div class="custom-modal-footer">
        <button type="button" id="btnNo" data-bs-dismiss="modal">No</button>
        <button type="button" id="btnSi">Sí</button>
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

    if (opcionSeleccionada === 'todo') {
        url = 'http://localhost:8000/api/v1/donaciones';
    } else if (opcionSeleccionada === 'completado') {
        url = 'http://localhost:8000/api/v1/donacionesCompletado';
    } else if (opcionSeleccionada === 'noCompletado') {
        url = 'http://localhost:8000/api/v1/donacionesNoCompletado';
    }

    
        fetch(url)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#donaciones-table tbody');
            tbody.innerHTML = ''; 

            data.results.forEach(donacion => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', donacion.idDonacion); 
                row.innerHTML = `
                    <td>${donacion.titulo}</td>
                    <td>${donacion.total_cantidad}</td>
                    <td>${donacion.objetivo}</td>
                    <td>${donacion.estado}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <i class="fa-solid fa-eye fa-lg me-3" onclick="verDonacion(${donacion.idDonacion})"></i>
                        <i class="fa-solid fa-pen-to-square fa-lg me-3" onclick="editarDonacion(${donacion.idDonacion})"></i>
                        <i class="fa-solid fa-trash delete-donacion fa-lg" onclick="eliminarDonacion(${donacion.idDonacion})"></i>
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
    // Obtener el título de la donación
    fetch(`http://localhost:8000/api/v1/donaciones/${idDonacion}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const modalTitle = document.getElementById('modalTitle');
            modalTitle.textContent = `¿Estás seguro de que quieres dar de baja "${data.result.titulo}"?`;
        })
        .catch(error => {
            console.error('Error al obtener el título de la donación:', error);
        });

    // Mostrar el modal de confirmación
    $('#confirmDeleteModal').modal('show');
    
    // Al hacer clic en el botón "Eliminar" en el modal de confirmación
    $('#btnSi').click(function() {
        // Realizar la eliminación si se confirma
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
        
        // Cerrar el modal después de eliminar
        $('#confirmDeleteModal').modal('hide');
    });
}




function verDonacion(idDonacion) {
    window.location.href = `{{ route('datos-donacion') }}?id=${idDonacion}`;
}

function editarDonacion(idDonacion) {
    window.location.href = `{{ route('editar-donacion') }}?id=${idDonacion}`;
}
</script>