@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>            
        @endif
            <a class="btn btn-primary mb-2 "
            href="{{ route('categories.create') }}">
            Add Category
            </a>
        @foreach ($categories as $category )
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title"> {{ $category->name }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $category->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text">{{ $category->description }}</p>
                    <a href="{{ route('categories.show', ['category' => $category]) }}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        @endforeach
    </div> --}}
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-6">
                    @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>            
                    @endif
                    <a class="btn btn-primary mb-2"
                    href="{{ route('categories.create') }}">
                    Add Category
                    </a>
                  <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $index=>$category )
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                        <a class="btn btn-info btn-md px-3" href="{{ route('categories.show',$category->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-warning btn-md px-3" href="{{ route('categories.edit',$category->id) }}"><i class="fa-solid fa-pen"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md px-3"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection