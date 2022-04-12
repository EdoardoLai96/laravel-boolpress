@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.categories.create')}}" class="btn btn-primary mb-4">Aggiungi una categoria</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th style="text-align: center" scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{route('admin.categories.show',$category->id)}}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning " href="{{route('admin.categories.edit',$category->id)}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>


                                    <form class="d-inline-block" method="POST" action="{{route('admin.categories.destroy', $category->id)}}">
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