@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>Create New Post in {{ $forum->title }}</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('forums.posts.store', $forum) }}" method="POST">
        @csrf
        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Create Post</button>
    </form>
    
    <a href="{{ route('forums.show', $forum) }}" class="btn btn-secondary mt-3">Back to Forum</a>
</div>
@endsection
