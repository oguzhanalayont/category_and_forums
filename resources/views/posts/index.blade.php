@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>Posts in {{ $forum->title }}</h1>
    <a href="{{ route('forums.posts.create', $forum) }}" class="btn btn-secondary mb-3">Create New Post</a>
    
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            @if($post->user)
                <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name }}</h6>
            @else
                <h6 class="card-subtitle mb-2 text-muted">By Unknown User</h6>
            @endif
            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
            <a href="{{ route('forums.posts.edit', [$forum, $post]) }}" class="btn btn-secondary btn-sm">Edit</a>
            <form action="{{ route('forums.posts.destroy', [$forum, $post]) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
