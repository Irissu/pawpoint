<!--MAIN-->
@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')


    <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-3" src="/../pawpoint/public/assets/logo-paw-color3.svg" alt="" width="112" height="112">
    <h1 class="display-5 fw-bold text-body-emphasis">Cuidado y Amor para Tu Mascota</h1>
    <div class="col-lg-10 mx-auto">
      <p class="lead mb-4">Bienvenidos a <strong>Clínica PawPoint</strong>, el lugar donde la salud y el bienestar de tus mascotas
    son nuestra prioridad. Con un equipo de veterinarios expertos y apasionados, ofrecemos un servicio integral y
    compasivo, diseñado para atender todas las necesidades de salud de tus animales de compañía. Desde vacunaciones y
    chequeos rutinarios hasta tratamientos especializados y emergencias, nuestra clínica está equipada con la tecnología
    más avanzada para garantizar el mejor cuidado posible. Explora nuestros servicios, pide cita, conoce a nuestro equipo, 
    y descubre cómo podemos ayudar a tu mascota a llevar una vida feliz y saludable.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="{{route('pets.index')}}" class="btn btn-primary btn-lg px-4 gap-3">Nuestros Peludos</a>
        <a href="{{ route('user.vets') }}" class="btn btn-outline-secondary btn-lg px-4" role="button">Veterinarios</a>
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

@endsection