@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="d-flex" action="{{ route('finder') }}" method="POST">
                @csrf @method('POST')
                <input class="form-control" type="text" name="text" placeholder="Buscador">
                <input class="btn btn-info" type="submit" value="BUSCAR">
            </form>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                <div class="p-2 bg-blue-300">
                    @foreach ($posts as $post)
                        <div class="card">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->contents }}</p>
                            {
                            @foreach ($post->tags as $tag)
                                <div class="d-flex">
                                    <span style="border: 2px">{{ $tag->tag }}</span>
                                <div>
                            @endforeach
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
