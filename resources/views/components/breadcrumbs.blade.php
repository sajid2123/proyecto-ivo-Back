<!-- bootstrap  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Fontawesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css  -->
<link rel="stylesheet" href="{{ asset('css/breadcrumb.css') }}">



<div class="container-fluid border-b">
    <div class="row font color size px-5">
      <div class="col-1 ml-3">
        <a class="pointer a-tag-breadcrumb" href="{{ $breadcrumbs[0]['routa-volver'] }}">
          <span class="mx-1">
            <i class="fa-solid fa-arrow-left"></i>
          </span>
          Volver
        </a>
      </div>
      <div class="col-11">
        <nav aria-label="breadcrumb" class="my-breadcrumb">
          <div class="nav-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="a-tag-breadcrumb" href="{{ $breadcrumbs[1]['routa-opcion-1'] }}">{{ $breadcrumbs[1]['nav-opcion-1'] }}</a>
              </li>
              <li class="breadcrumb-item activePage-breadcrumnb" >
                <a class="a-tag-breadcrumb">{{ $breadcrumbs[2]['nav-opcion-2'] }}</a>
              </li>
            </ol>
          </div>
        </nav>
      </div>
  </div>
</div>
