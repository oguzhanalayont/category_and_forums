@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>{{ $post->title }}</h1>
    <p>Posted by: {{ $post->user->name }} in {{ $forum->title }}</p>
    <div class="card mb-4">
        <div class="card-body">
            {{ $post->content }}
        </div>
    </div>
    
    <a href="{{ route('forums.posts.edit', [$forum, $post]) }}" class="btn btn-primary">Edit Post</a>
    <form action="{{ route('forums.posts.destroy', [$forum, $post]) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
    </form>
    <a href="{{ route('forums.posts.index', $forum) }}" class="btn btn-secondary">Back to Posts</a>
</div>
@endsection



