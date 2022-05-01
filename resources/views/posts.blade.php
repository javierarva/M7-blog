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

                            <h5>Etiquetas:</h5>
                            <div class="d-flex" style="gap: 10px">
                                @foreach ($post->tags as $tag)
                                    <h4><span class="badge badge-primary">{{ $tag->tag }}</span></h4>
                                @endforeach
                            </div>

                            <div style="gap:10px" class="d-flex">
                                <a href="{{ route('posts.edit', $post) }}"><button class="btn btn-primary">EDITAR</button></a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <input type="submit" value="ELIMINAR" class="btn btn-danger">
                                </form>
                            </div>
                            <hr>
                            <form action="{{ route('comments.store') }}" method="POST" class="form">
                                @csrf @method('POST')
                                <label for="postId">ID de Post:</label>
                                <input class="form-control" type="number" name="postId" value="{{ $post->id }}">
                                <input class="form-control" name="comment" type="text" placeholder="Comentario" required><br>
                                <input type="submit" value="COMENTAR" class="btn btn-info">
                            </form>
                            <hr>
                            <h5>Comentarios:</h5>
                            {{--@foreach ($comments as $comment)
                                <h3>{{ $comment->user_id->username }}</h3>
                                <p>{{ $comment->comment }}</p>
                            @endforeach--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
