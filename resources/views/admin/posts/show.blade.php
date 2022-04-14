@extends('admin.layouts.base')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{isset($post->category) ? $post->category->name : 'ND'}}
            </div>
            @if ($post->cover)
             <img class="card-img-top" src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
            @else
             <img class="card-img-top" src="{{asset('img/fallback_img.png')}}" alt="{{$post->title}}">
        @endif
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>


                    @foreach ($post->tags as $tag)
                    <span class="badge rounded-pill bg-dark text-white px-2 py-1">{{$tag->name}}</span>
                    @endforeach        
                
                <div class="mt-3">
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna a tutti i Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection
