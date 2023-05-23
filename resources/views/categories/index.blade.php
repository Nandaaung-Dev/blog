@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection