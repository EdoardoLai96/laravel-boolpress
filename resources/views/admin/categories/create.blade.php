@extends('admin.layouts.base')

@section('content')
    <form class="container" action="{{route('admin.categories.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('title')}}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Aggiungi Categoria</button>
          </div>
    </form>
@endsection