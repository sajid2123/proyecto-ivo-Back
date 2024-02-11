<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-2">
            <h1>dsadasda</h1>
        </div>
        <div class="col-10">

        </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<h1>Aqui va dashboard</h1>

<h1>Nombre Usuario: {{Auth::guard('usuario')->user()->nombre}}</h1>


<a href="{{route('usuario.logout')}}">Logout</a>