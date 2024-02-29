<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container-fluid ">
    <div class="row heigth font color">
        <div class="col-6 d-flex align-items-center justify-content-center ">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
        </div>
        <div class="col-6  p-5 d-flex  justify-content-center flex-column">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h1 class="title">
                        Inicia sesión
                    </h1>
                </div> 
            </div>  
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <p class="sub-title">Introduzca su correo y contraseña</p>
                </div>
               
            </div>
            <div class="row mb-3">
                <div class="col-12 text-center px-5">
                    @if(Session::has('error'))
                        <p class="error">{{ session::get('error')}}</p> 
                    @elseif(Session::has('logout'))
                        <p class="logout">{{ session::get('logout')}}</p> 
                    
                    @endif
                </div>
               
            </div>
            <div class="row justify-content-center">
                <div class="col-12 px-5">
                    <form method="POST" action="{{ route('usuario.login') }}">
                        @csrf <!-- Token CSRF para proteger tu formulario -->
                        
                        <div class="form-group">
                            <label for="email">Correo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user color user-icon"></i></span>
                                    <input type="email" class="form-control input-style" id="email" name="email" required autofocus>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-lock color lock-icon"></i></span>
                                    <input type="password" class="form-control input-style" id="password" name="password" required>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Recuérdame</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group form-check d-flex align-items-center justify-content-end">
                                    
                                    <label class="form-check-label" for="remember">¿Has olvidado la contraseña?</label>
                                </div>
                            </div>
                        </div>
                       

                        <div class="row justify-content-center">
                            <div class="col-4">
                                <button type="submit" class="btn submit-btn btn-block">Inicia sesión</button>
                            </div>
                        </div>
                        

                    
            
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