<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if(Session::has('error'))
{{ session::get('error')}}
@endif
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Inicia sesión</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.login') }}">
                        @csrf <!-- Token CSRF para proteger tu formulario -->
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recuérdame</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Inicia sesión</button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                ¿Has olvidado tu contraseña?
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluye Bootstrap JS y dependencias JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>





<!-- <h1>Aqui va login</h1>
@if(Session::has('error'))
{{ session::get('error')}}
@else
<h1>Else</h1>
@endif


<form action="{{ route('usuario.login') }}" method="POST">
@csrf
    <label for="correo">Correo</label>
    <input type="email" name="email">
    <br>
    <label for="password">Contraseña</label>
    <input type="password" name="pwd">
    <br>
    <input type="submit" value="Enviar">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->