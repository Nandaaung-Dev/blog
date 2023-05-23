@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-warning">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $category->name }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Enter description">{{ $category->description }}</textarea>
        </div>
        <input type="submit" value="Update Category"
        class="btn btn-primary float-end">
    </form>
</div>
@endsection