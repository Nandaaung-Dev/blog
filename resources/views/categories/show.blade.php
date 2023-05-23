@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <div class="card-subtitle mb-2 text-muted small"> {{ $category->created_at->diffForHumans() }}</div>
                <p class="card-text">{{ $category->description }}</p>
                <a class="btn btn-warning"
                href="{{ route('categories.edit', ['category' => $category]) }}">
                Edit Category
                </a>
                <form action="{{ route('categories.destroy',['category' => $category]) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection