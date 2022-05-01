@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Auth::user()->isAdmin(Auth::user()))
                        <div class="alert alert-success" role="alert">
                            <p>¡Bienvenido Admin {{ Auth::user()->username }}, crea tantos posts y administra como quieras!</p>
                        </div>
                    @else
                    <div class="alert alert-success" role="alert">
                        <p>¡Bienvenido {{ Auth::user()->username }}, crea tantos posts como quieras!</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
