@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small"> {{ $article->created_at->diffForHumans() }}</div>
                <p class="card-text">{{ $article->body }}</p>
                <form action="{{route('articles.destroy', ['article' => $article])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning"
                    href="{{ route('articles.edit', ['article' => $article]) }}">
                    Edit
                    </a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection