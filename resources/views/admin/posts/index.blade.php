@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-4">Crea un post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th style="text-align: center" scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{substr($post->content, 0, 30)}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{isset($post->category) ? $post->category->name : 'ND'}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('admin.posts.show',$post->id)}}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning " href="{{route('admin.posts.edit',$post->id)}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>


                                    <form class="d-inline-block" method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection