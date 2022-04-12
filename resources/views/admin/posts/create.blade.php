@extends('admin.layouts.base')

@section('content')
    <form class="container" action="{{route('admin.posts.store')}}" method="POST">
        @csrf

        <div class="form-group">
          <label for="category_id">Categoria</label>
          <select class="form-control" id="category_id" name="category_id">

              <option value="">Nessuna categoria...</option>

              @foreach ($categories as $category)
                  <option {{old('category_id') == $category->id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
              @endforeach

          </select>
      </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Contenuto:</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{old('content')}}</textarea>
          </div>

          @foreach ($tags as $tag)
          <div class="custom-control custom-checkbox">
              <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array($tag->id, old('tags', []))?'checked':''}}>
              <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
          </div>
          @endforeach 
            
            
            <div class="mb-3">
            <button type="submit" class="btn btn-primary my-3">Crea Nuovo Post</button>
          </div>
    </form>
@endsection