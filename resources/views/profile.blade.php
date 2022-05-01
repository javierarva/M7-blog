@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mi Perfil') }}</div>

                <div class="card">
                    <span>Nombre: {{$user->username}}</span>
                    <span>Email: {{$user->email}}</span>
                    <span>Rol: {{$user->role->role}}</span>
                </div>
                <div>
                    <a href="{{ route('editProfile') }}"><button class="btn btn-primary">Administrar Perfil</button></a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
