@extends('admin.layouts.base')

@section('content')
    <form class="container" action="{{route('admin.categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $category->name)}}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Modifica</button>
          </div>
    </form>
@endsection