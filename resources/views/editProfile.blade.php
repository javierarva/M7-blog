@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edición de Perfil') }}</div>

                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf @method('PUT')
                    <input name="username" class="form-control" type="text" placeholder="Nuevo Nombre">
                    <input name="email" class="form-control" type="text" placeholder="Nuevo Email">
                    <input name="password" class="form-control" type="password" placeholder="Nueva Contraseña">
                    <input type="submit" value="ACTUALIZAR" class="btn btn-primary">
                </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
