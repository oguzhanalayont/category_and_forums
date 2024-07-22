@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>Forums</h1>
    <a href="{{ route('forums.create') }}" class="btn btn-secondary mb-3">Create New Forum</a>
    
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Posts Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forums as $forum)
            <tr>
                <td>{{ $forum->title }}</td>
                <td>{{ $forum->posts_count }}</td>
                <td>
                    <a href="{{ route('forums.show', $forum->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('forums.posts.index', $forum->id) }}" class="btn btn-secondary btn-sm">View Posts</a>
                    <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" style="display:inline">
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
});
</script>
@endsection