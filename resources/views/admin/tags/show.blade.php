@extends('admin.layouts.base')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
            Vedi tutti i post per il tag #{{$tag->name}}
            </div>
            <div class="card-body">
                @foreach ($tag->posts as $post)
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('admin.tags.index')}}" class="btn btn-primary mb-3">Torna a tutti i tag</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection