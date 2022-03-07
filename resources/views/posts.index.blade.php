@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                <div class="p-2 bg-blue-300">
                    @foreach ($posts as $post)
                    <h2>{{$post->title}}</h2>
                    {{$post->contents}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
