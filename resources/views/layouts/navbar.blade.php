<!--HEADER-->
<header>
  <div class="container-fluid d-flex align-items-center justify-content-between px-4 py-1" style="background-color: rgb(26, 188, 156);">
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
      <a class="navbar-brand mb-0 h1" href="{{ route('home') }}" >
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
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">INICIO</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CITAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">PEDIR CITA</a></li>
            <!-- estas dos secciones, solo accesibles para usuarios autenticados con el type '1' o 'owner'. 
            Deberia ser: si el usuario está autenticado y si en la tabla type_user el usuario tiene el type_id 1  -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">MIS CITAS</a></li>
            <li><a class="dropdown-item" href="{{ route('appointments.index')}}">GESTION CITAS</a></li>
          
          </ul>
        </li>
        


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MASCOTAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('pets.dogs') }}">PERROS</a></li>
            <li><a class="dropdown-item" href="{{ route('pets.cats') }}">GATOS</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('pets.mypets' )}}">MIS MASCOTAS</a></li>
            <li><a class="dropdown-item" href="{{ route('pets.create') }}">REGISTRAR MASCOTA</a></li>
          </ul>
        </li>
        @guest
        <li class="nav-item">
        <a href="{{ route('registro') }}" class="btn btn-outline-light me-3">REGISTRO</a>
        </li>
          <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-outline-light">LOGIN</a>
        </li>
        @endguest
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    <!-- icono de usuario, solo visible si usuario autenticado-->

    @if (Auth::check())
    <a href="{{ route('users.show', Auth::user()->id) }}" class="text-white m-auto p-3" style="text-decoration: none;">{{ Auth::user()->name }}</a>
    <a href="{{ route('users.show', Auth::user()->id) }}" class="m-auto"><i class="bi bi-person-circle text-white m-auto "style="font-size: 1.7rem; " ></i></a>
    <form method="POST" action="{{ route('logout') }}" class="m-auto">
              @csrf
                <button type="submit" style="background: none; border: none;">
                <i class="bi bi-box-arrow-right text-white m-auto p-3" style="font-size: 1.7rem;"></i>
                </button>
    </form>


    @endif
     
      
    </div>
  </div>
</header>