@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <img src="/uploads/imagenes/{{ $usuario->avatar }}" style="width: 145px;height: 145px;float: left;border-radius: 50%;margin-left: 25px">
            <h2>{{ $usuario->name }}</h2>

            <form action="{{ url('perfil') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label>Actualizar tu foto de perfil</label>
                <input type="file" name="imagen-perfil">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
