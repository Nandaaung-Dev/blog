@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>            
        @endif
       <h1>Category Page</h1>
       <a class="btn btn-info"
       href="{{ route('categories.create') }}">
       Create Category
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
    </div>
@endsection