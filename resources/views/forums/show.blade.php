@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>Forum: {{ $forum->title }}</h1>
    <p>Category: <a href="{{ route('categories.show', $forum->category_id) }}">{{ $forum->category->name }}</a></p>
    <div class="card mb-4">
        <div class="card-body">
            {{ $forum->content }}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Post Title</th>
                <th>Post Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 100) }}</td>
                <td>
                    <form action="{{ route('forums.posts.destroy', [$forum, $post]) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('forums.posts.create', $forum) }}" class="btn btn-secondary me-2 mb-2">Create New Post</a>
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
