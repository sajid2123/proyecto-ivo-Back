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
<!-- script javascript  -->
<script type="text/javascript" language="javascript" src="{{ asset('js/servicioFormulario.js') }}"></script>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>

<style>
#confirmDeleteModal {
    width: 300px;
    margin-left:50%;
    margin-top: 10%;
}

.modal-content {
    background-color: #EBF3FA !important;
}

.custom-modal-height {
    height: 300px; /* Ajusta esta altura según tus necesidades */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.custom-modal-footer {
  display: flex;
  padding: 10px;
}

#modalTitle {
    margin: 7%;
}

#imgTick {
    width: 25%;
}

#btnModalContinuar {
    color: #EBF3FA;
    background-color: #092C4C;
    height: 40px;
    width: 60%;
    margin-top:5%;
    border-radius: 8px;
}

</style>

<div class="container-fluid font">
    <div class="row">
        <div class="col-2">
            @include('usuario.gestor.nav')
        </div>
        <div class="col-10 p-0">
            <div class="row mt-4 ">
                <div class="col-12 px-5">
                    <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <h5><a href="{{route('donacion.mostrar')}}" style="text-decoration: none; color: inherit;"><i class="fa-solid fa-arrow-left me-3"></i>Volver</a></h5>
                        <h5 class="ms-3">Donacion / <strong>Crear Donacion</strong></h5>
                    </div>
                    </div>
                    <hr style="width: 100%; border-color:black">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 px-5">
                    <h1 class="title">
                        Crear Donación
                    </h1>
                </div>
            </div>
            @if($errors->any())
            @isset($errors)
            <div class="row mt-4">
                <div class="col-12 px-5">
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
            @endif
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
                            <a href="{{ route('gestor.add-rol')}}">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 px-5">
                    <div class="d-flex  me-3">
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
                    <form>
                        @csrf
                        <div id="paso-1" class="me-3">
                            <div class="row mt-4  ">
                                <div class="col-12">
                                    <h4>Introduce los datos.</h4>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-4">
                                    <label for="titulo" class="my-3 label-personalizado">Título</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style" name="titulo"
                                                id="titulo" autofocus>
                                        </div>
                                    </div>
                                    <p id="error-titulo" class="text-danger" hidden>El título es obligatorio.</p>
                                </div>

                                <div class="col-4">
                                    <label for="objetivo" class="my-3 label-personalizado">Objetivo en €</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-style" name="objetivo"
                                                id="objetivo">
                                        </div>
                                    </div>
                                    <p id="error-objetivo" class="text-danger" hidden>El objetivo es obligatorio.</p>
                                </div>

                                <div class="col-4">
                                    <label for="fecha_limite" class="my-3 label-personalizado">Fecha límite</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" class="form-control input-style" name="fecha_limite"
                                                id="fecha_limite">
                                        </div>
                                    </div>
                                    <p id="error-fecha" class="text-danger" hidden>La fecha es obligatoria.</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="me-3">
                                    <label for="descripcion" class="my-3 label-personalizado">Descripción</label>
                                    <div class="form-group">
                                        <textarea class="form-control input-style" name="descripcion" id="descripcion"
                                            rows="5"></textarea>
                                    </div>
                                </div>
                                <p id="error-descripcion" class="text-danger" hidden>La descripción es obligatoria.</p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="imagen" class="my-3 label-personalizado">Subir imagen</label>
                                    <div class="form-group position-relative">
                                        <input type="text" class="form-control input-style" name="imagen" id="imagen"
                                            onclick="document.getElementById('inputFile').click();">
                                        <i class="fa-solid fa-upload position-absolute"
                                            style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                                        <input type="file" id="inputFile" style="display:none;">
                                    </div>
                                </div>
                            </div>



                        </div>


                        <div class="row mt-5">
                            <div class="col-6">
                                <a href="{{route('donacion.mostrar')}}" class="btn-cancelar">Cancelar</a>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a class="btn-pasos mx-2" id="btnAnterior" style="display: none;">Anterior</a>
                                <a class="btn-pasos mx-2" id="btnSiguiente">Siguiente</a>
                                <a class="btn-pasos mx-2" id="btnConfirmar"  onclick="crearDonacion()" style="display: none;">Confirmar</a>
                                
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content custom-modal-height">
        <img src="{{ asset('imagenes/tick.png') }}" alt="" id="imgTick">
        <h4 id="modalTitle">Donación creada exitósamente.</h4>
        <button type="button" id="btnModalContinuar" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='{{route('donacion.mostrar')}}'">Continuar</button>
    </div>
  </div>
</div>






<script>
document.getElementById('inputFile').addEventListener('change', function() {
    var file = this.files[0];
    var inputField = document.getElementById('imagen');
    if (file) {
        inputField.value = file.name;
    }
});

document.getElementById("btnSiguiente").addEventListener("click", function() {
    var campos = [
        { id: 'titulo', errorId: 'error-titulo' },
        { id: 'objetivo', errorId: 'error-objetivo' },
        { id: 'fecha_limite', errorId: 'error-fecha' },
        { id: 'descripcion', errorId: 'error-descripcion' }
    ];
    
    var hayError = false; 
    campos.forEach(function(campo) {
        var valor = document.getElementById(campo.id).value.trim();
        var error = document.getElementById(campo.errorId);

        if (valor === '') {
            error.hidden = false;
            hayError = true;
        } else {
            error.innerText = ''; 
            error.hidden = true; 
        }
    });

    if (hayError) {
        return;
    }

    this.style.display = "none";
    document.getElementById("btnAnterior").style.display = "inline-block";
    document.getElementById("btnConfirmar").style.display = "inline-block";

    var deshabilitar = ["titulo", "objetivo", "fecha_limite", "descripcion", "imagen"];
    deshabilitar.forEach(function(id) {
        document.getElementById(id).disabled = true;
    });

    document.getElementById("paso-barra-1").classList.add("non-active-paso");
    document.getElementById("paso-barra-1").classList.remove("active-paso");
    document.getElementById("paso-barra-2").classList.remove("non-active-paso");
    document.getElementById("paso-barra-2").classList.add("active-paso");
});



document.getElementById("btnAnterior").addEventListener("click", function() {
    this.style.display = "none";

    document.getElementById("btnSiguiente").style.display = "inline-block";
    document.getElementById("btnConfirmar").style.display = "none";

    var habilitar = ["titulo", "objetivo", "fecha_limite", "descripcion", "imagen"];
    habilitar.forEach(function(id) {
        document.getElementById(id).disabled = false;
    });

    document.getElementById("paso-barra-1").classList.remove("non-active-paso");
    document.getElementById("paso-barra-1").classList.add("active-paso");

    document.getElementById("paso-barra-2").classList.add("non-active-paso");
    document.getElementById("paso-barra-2").classList.remove("active-paso");

});

function crearDonacion() {
    var titulo = document.getElementById('titulo').value;
    var objetivo = document.getElementById('objetivo').value;
    var descripcion = document.getElementById('descripcion').value;
    var fechaLimite = document.getElementById('fecha_limite').value;
    var imagen = document.getElementById('inputFile').files[0];

    var formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('objetivo', objetivo);
    formData.append('descripcion', descripcion);
    formData.append('fecha_limite', fechaLimite);
    formData.append('imagen', imagen); 

    fetch('http://localhost:8000/api/v1/crear-donacion', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        $('#confirmDeleteModal').modal('show');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al crear la donación.');
    });
}

</script>