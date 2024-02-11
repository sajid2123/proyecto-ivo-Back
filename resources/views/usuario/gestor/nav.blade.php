<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Css  -->
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

<div class="container-fluid font">
        <div class="row">
            <div class="col-2 position-fixed nav-style ">
                <div class="row pt-5">
                    <div class="col-12 text-center">
                        <img src="{{ asset('img/logoIvoBlanco.png') }}" alt="Logo" width="100px" heigth="100px">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <ul class="nav navbar-nav d-flex flex-column align-items-center">
                            <li class="nav-item pointer">
                                <a class="nav-link  px-3 nav-opcion {{ request()->is('usuario', 'usuario/*') ? 'nav-active' : '' }}">
                                    <i class="fa-solid fa-user mx-2"></i>
                                    Usaurio
                                </a>
                            </li>
                            <li class="nav-item mt-3 pointer">
                            <a class="nav-link  px-3 nav-opcion">
                                Servicios
                            </a>
                            </li>
                            <li class="nav-item mt-3 pointer">
                            <a class="nav-link  px-3 nav-opcion" >
                                Roles
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>  
                <div class="row mt">
                    <div class="col-12  d-flex align-items-center justify-content-center">
                        <a href="" class="a-tag d-flex flex-column mx-4">
                            <span class="nombre">{{Auth::guard('usuario')->user()->nombre}}</span>
                            <span class="correo">{{Auth::guard('usuario')->user()->correo}}</span>
                        </a>
                        <a href="{{route('usuario.logout')}}" class="a-tag logout-icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </div>
                
                </div>
            </div>
        </div>
</div>
    







 

