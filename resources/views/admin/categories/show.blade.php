@extends('admin.layouts.base')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
            Post #{{$post->id}}
            </div>
            <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
            <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Torna a tutte le categorie</a>
            </div>
        </div>
    </div>
@endsection
