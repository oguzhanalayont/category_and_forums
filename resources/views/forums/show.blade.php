@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $forum->title }}</h1>
    <p>Category: <a href="{{ route('categories.show', $forum->category_id) }}">{{ $forum->category->name }}</a></p>
    <div class="card mb-4">
        <div class="card-body">
            {{ $forum->content }}
        </div>
    </div>
    <div>
        <a href="{{ route('categories.show', $forum->category_id) }}" class="btn btn-secondary me-2 mb-2">Back to Category</a>
        <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-secondary me-2 mb-2">Edit Forum</a>
        <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary mb-2" onclick="return confirm('Are you sure you want to delete this forum?')">Delete Forum</button>
        </form>
    </div>
</div>
@endsection