@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('Admin') }}</div>
            <div class="card">
                <h2>Administrar Posts</h2>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->contents}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar Post</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar Post</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
            <div class="card">
                <h2>Administrar Usuarios</h2>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->role_id}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $post)}}">Editar Post</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.users.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar Post</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    </div>
</div>
@endsection
