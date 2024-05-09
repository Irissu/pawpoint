@extends('layouts.layout')

@section('title', 'Formulario de registro')

@section('content')

<style>
    .inputs input {
        border: 0;
        height: 50px;
        border-radius: 0;
        border-bottom: 2px solid #1ABC9C;
    }

    .inputs input:focus {
        border-bottom: 1px solid #007bff;
        box-shadow: none;
        outline: 0;
        background-color: #ebebeb;
    }

    .sideline {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #ccc;
    }

    button {
        height: 50px;
    }

    .sideline:before,
    .sideline:after {
        content: '';
        border-top: 1px solid #ebebeb;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }

    .sideline:after {
        margin: 0 0 0 20px;
    }

    .pet-form {
        object-fit: cover;
    }
</style>

<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
<div class="container">
    <div class="row m-5 no-gutters shadow-lg form-base">
        <div class="col-md-4 d-none d-md-block p-0">
            <img src="/../pawpoint/public/assets/cat-and-dog-big.jpg" class="img-fluid pet-form rounded-start" style="min-height:100%;" />
        </div>
        <div class="col-md-8 bg-white p-5">

            <h3 class="pb-3">Formulario de Registro</h3>
            <div class="form-style">
                <form method="post" action=" {{ route('registros') }}">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group pb-3 inputs">
                        <input type="text" name="id" placeholder="DNI" class="form-control" id="dniInput" required>
                    </div>

                    <div class="form-group pb-3 inputs">
                        <input type="text" name="name" placeholder="Nombre" class="form-control" id="nameInput" required>
                    </div>

                    <div class="form-group pb-3 inputs">
                        <input type="text" name="lastname" placeholder="Apellido" class="form-control" id="surnameInput" required>
                    </div>

                    <div class="form-group pb-3 inputs">
                        <input type="email" name="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="form-group pb-3 inputs">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1" required>
                    </div>

                    <div class="form-group">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="type_id[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                Dueño
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="flexCheck" name="type_id[]">
                            <label class="form-check-label" for="flexCheck">
                                Veterinario
                            </label>
                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <!--  <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Recordarme</span></div> -->
                        <div><a href="{{ route('login') }}" class="link-secondary link-underline-opacity-0">¿Ya tienes cuenta? Accede</a></div>
                    </div>

                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Registrarse</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


@endsection