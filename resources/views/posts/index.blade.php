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
    <a href="{{ route('forums.show', $forum) }}" class="btn btn-secondary mb-3">Back to Forum Page</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->user)
                        {{ $post->user->name }}
                    @else
                        Unknown User
                    @endif
                </td>
                <td>{{ Str::limit($post->content, 100) }}</td>
                <td>
                    <a href="{{ route('forums.posts.edit', [$forum, $post]) }}" class="btn btn-secondary btn-sm">Edit</a>
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
</div>
@endsection
