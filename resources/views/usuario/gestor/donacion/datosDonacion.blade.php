<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/gestor.css') }}">

<!-- JavaScript -->
<script type="text/javascript" language="javascript" src="{{ asset('js/servicioFormulario.js') }}"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
#dDescripcion {
    height: 30vh;
}

h5,
h3 {
    color: #092C4C;
}

.progress {
    border: 2px solid black;
    background-color: white !important;
    border-radius: 60px !important;
}

.progress-bar {
    background-color: #092C4C !important;
    border-radius: 60px
}

button {
    color: white;
    background-color: #092C4C;
    border-radius: 10px !important;
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
                        <h5><a href="{{route('donacion.mostrar')}}" style="text-decoration: none; color: inherit;"><i
                                    class="fa-solid fa-arrow-left me-3"></i>Volver</a></h5>
                        <h5 class="ms-3">Donacion / <strong>Datos de la donación</strong></h5>
                    </div>
                    <hr style="width: 100%; border-color:black">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 px-5">
                    <h1 class="title" id="nombreDonacion" style="color:#092C4C">

                    </h1>
                </div>
            </div>

            <div name="graficas" class="row mt-4">
                <div name="crearGraficoDonacionesPorDiaSemana" class="col-md-4 mx-md-auto mb-4">
                    <canvas id="crearGraficoDonacionesPorDiaSemana"></canvas>
                </div>
                <div id="dDescripcion" class="col-md-4 mx-md-auto mb-4" style="border: 1px solid #092C4C;">
                    <h3>Descripción</h3>
                    <div id="descripcion" style="height: 22vh; overflow-y: auto;">
       
                    </div>
                </div>
            </div>


            <div name="numeros" class="row mt-4 ms-5 justify-content-between">
                <div name="dSemanales" class="col-md-4 mx-md-auto mb-4 text-center">
                    <h5>Porcentaje para el objetivo</h5>
                    <h4 id="lPorcentaje"></h4>
                </div>
                <div name="dMensuales" class="col-md-4 mx-md-auto mb-4 text-center">
                    <h5>Número de donaciones</h5>
                    <h4 id="totalDonaciones"></h4>
                </div>
                <div name="dMedia" class="col-md-4 mx-md-auto mb-4 text-center">
                    <h5>Donación media</h5>
                    <h4 id="donacionMedia"></h4>
                </div>
            </div>

            <div class="row mt-3 me-5">

                <div class="col-md-11 mx-auto">

                    <div class="d-flex align-items-center justify-content-between ms-5">
                        <h5 class="text-start">0 €</h5>
                        <h5 class="text-end" id="objetivo"></h5>
                    </div>

                    @php
                    $valuenow = 123;
                    $valuemax = 150;
                    $progress_percentage = ($valuenow / $valuemax) * 100;
                    @endphp
                    <div class="ms-5 mb-5">
                        <div class="progress-container">
                            <div class="progress" style="height:60px">
                                <div class="progress-bar" role="progressbar" style="width: {{$progress_percentage}}%;"
                                    aria-valuenow="{{$valuenow}}" aria-valuemin="0" aria-valuemax="{{$valuemax}}">
                                    {{$valuenow}}</div>
                            </div>
                        </div>


                    </div>
                    <button class="ms-5 mt-5" style="width: 15%; height:50px"><a href="{{route('donacion.mostrar')}}"
                            style="text-decoration: none; color: inherit;">Volver</button>

                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener la id de la url    
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            function cargarDetalles(idDonacion) {
                fetch(`http://localhost:8000/api/v1/donaciones/${idDonacion}`)
                    .then(response => response.json())
                    .then(data => {
                        const {
                            titulo,
                            objetivo,
                            fecha_limite,
                            descripcion,
                            imagen,
                            total_cantidad,
                            total_donaciones
                        } = data.result;

                        document.getElementById('nombreDonacion').innerText = titulo;
                        document.getElementById('descripcion').innerText = descripcion;

                        const valuenow = total_cantidad;
                        const valuemax = objetivo;
                        var totalDonaciones = total_donaciones;
                        document.getElementById('objetivo').innerText = objetivo + ' €';

                        var donacionMedia = valuenow / totalDonaciones;
                        document.getElementById('donacionMedia').innerText = donacionMedia;
                        document.getElementById('totalDonaciones').innerText = totalDonaciones;

                        const progress_percentage = (valuenow / valuemax) * 100;

                        const progressBar = document.querySelector('.progress-bar');
                        progressBar.style.width = `${progress_percentage}%`;

                        progressBar.innerText = valuenow;

                        var porcentaje = (valuenow / valuemax) * 100;
                        porcentaje = Number(porcentaje.toFixed(2));
                        document.getElementById('lPorcentaje').innerText = porcentaje + '%';

                        console.log(data);
                    })
                    .catch(error => console.error('Error al cargar detalles de donación:', error));
            }

            function obtenerNombreImagen(rutaImagenCompleta) {
                const partesRuta = rutaImagenCompleta.split('/');
                return partesRuta[partesRuta.length - 1];
            }

            function dDonacionesPorDia() {
                fetch('http://localhost:8000/api/v1/cantidad-donaciones/5')
                    .then(response => response.json())
                    .then(data => {
                        const fechasDonaciones = data.fechas_donaciones_realizadas;
                        const cantidadPorDia = [0, 0, 0, 0, 0, 0, 0];
                        fechasDonaciones.forEach(fecha => {
                            const diaSemana = new Date(fecha).getDay();
                            cantidadPorDia[diaSemana]++;
                        });

                        var ctx = document.getElementById('crearGraficoDonacionesPorDiaSemana').getContext(
                            '2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
                                datasets: [{
                                    label: 'Donaciones por día',
                                    data: cantidadPorDia,
                                    backgroundColor: 'rgba(9,44,76)',
                                    borderColor: 'rgba(9,44,76)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error(
                        'Error al cargar la cantidad de donaciones por día de la semana:', error));
            }



            window.onload = function() {
                dDonacionesPorDia();
                //cargarGraficoDonacionesPorDiaSemana();
                const idDonacion = getParameterByName('id');
                if (idDonacion) {
                    cargarDetalles(idDonacion);

                    // Realizar una solicitud GET a la API para obtener la cantidad de donaciones y las fechas
                    fetch(`http://localhost:8000/api/v1/cantidad-donaciones/${idDonacion}`)
                        .then(response => response.json())
                        .then(data => {
                            // Mostrar la cantidad de donaciones en la consola
                            console.log('Cantidad de donaciones realizadas:', data
                                .cantidad_donaciones_realizadas);
                            document.getElementById('totalDonaciones').innerText = data
                                .cantidad_donaciones_realizadas;
                            // Mostrar todas las fechas de las donaciones realizadas junto con el día de la semana
                            console.log('Fechas de las donaciones realizadas:');
                            data.fechas_donaciones_realizadas.forEach(fecha => {
                                const diaSemana = obtenerDiaSemana(new Date(fecha));
                                console.log(`${fecha} (${diaSemana})`);
                            });

                        })
                        .catch(error => console.error('Error al obtener la cantidad de donaciones:',
                        error));
                } else {
                    console.error('No se proporcionó un ID de donación en la URL.');
                }
            };

            // Función para obtener el día de la semana a partir de una fecha
            function obtenerDiaSemana(fecha) {
                const diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                return diasSemana[fecha.getDay()];
            }
        });
        </script>