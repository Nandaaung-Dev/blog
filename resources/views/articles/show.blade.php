@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>            
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small"> {{ $article->created_at->diffForHumans() }}</div>
                Category: <b>{{ $article->category->name }}</b>
                <p class="card-text">{{ $article->body }}</p>
                @auth
                <form action="{{route('articles.destroy', ['article' => $article])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning"
                    href="{{ route('articles.edit', ['article' => $article]) }}">
                    Edit
                    </a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endauth
                <ul class="list-group my-3">
                    <li class="list-group-item active">
                    <b>Comments ({{ count($article->comments) }})</b>
                    </li>
                    @foreach($article->comments as $comment)
                    <li class="list-group-item">
                    @auth
                    <a href="{{ url("/comments/delete/$comment->id") }}"
                        class="btn-close float-end">
                    </a>
                    @endauth
                    {{ $comment->content }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </li>
                    @endforeach
                </ul>
                @auth
                <form action="{{ url('/comments/add') }}" method="post">
                    @csrf
                    <input type="hidden" name="article_id"
                    value="{{ $article->id }}">
                    <textarea name="content" class="form-control mb-2"
                    placeholder="New Comment"></textarea>
                    <input type="submit" value="Add Comment"
                    class="btn btn-secondary">
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection