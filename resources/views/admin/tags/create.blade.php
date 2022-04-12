@extends('admin.layouts.base')

@section('content')
    <form class="container" action="{{route('admin.tags.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tag:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('tag')}}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Aggiungi Tag</button>
          </div>
    </form>
@endsection