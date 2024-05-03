<!--HEADER-->
<header>
  <div class="container-fluid d-flex align-items-center justify-content-between px-4 py-1" style="background-color: rgb(26, 188, 156);">
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
      <a class="navbar-brand mb-0 h1" href=" #" >
        <img src="/../pawpoint/public/assets/logo-paw-white.svg" alt="logo" class="img-fluid me-2" alt="..." style="width: auto; height: 50px;"> 
        PAWPOINT
      </a>
    </nav>
    <div class="m-2 d-flex">
   
    <nav class="navbar navbar-expand-lg " data-bs-theme="dark">
  <div class="container-fluid me-4">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CITAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">PEDIR CITA</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- estas dos secciones, solo accesibles para usuarios autenticados con el type '1' o 'owner'. Deberia ser: si el usuario está autenticado y si en la tabla type_user el usuario
              tiene el type_id 1  -->
            @if (Auth::check() && Auth::user()->type_id == 1)
            <li><a class="dropdown-item" href="#">MIS CITAS</a></li>
            <li><a class="dropdown-item" href="#">GESTION CITAS</a></li>
            @endif
          </ul>
        </li>
        


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MASCOTAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">PERROS</a></li>
            <li><a class="dropdown-item" href="#">GATOS</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">MIS MASCOTAS</a></li>
            <li><a class="dropdown-item" href="#">REGISTRAR MASCOTA</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-light me-3">REGISTRO</button>
        </li>
          <li class="nav-item">
          <button type="button" class="btn btn-outline-light">LOGIN</button>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    
    
    <!-- icono de usuario, solo visible si usuario autenticado-->

    @if (Auth::check())
    <a href="#" class="text-white me-3" style="text-decoration: none;">{{ Auth::user()->name }}</a>
    <i class="bi bi-person-circle text-white me-3 " style="font-size: 1.7rem; " ></i>
    @endif
     
      
    </div>
  </div>
</header>