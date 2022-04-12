@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.tags.create')}}" class="btn btn-primary mb-4">Aggiungi un tag</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                        <th style="text-align: center" scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('admin.tags.show',$tag->id)}}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning " href="{{route('admin.tags.edit',$tag->id)}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>


                                    <form class="d-inline-block" method="POST" action="{{route('admin.tags.destroy', $tag->id)}}">
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