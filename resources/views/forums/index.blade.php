@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
    .container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    .btn {
        padding: 5px 10px;
        margin-right: 5px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .btn-primary { background-color: #007bff; color: white; }
    .btn-info { background-color: #17a2b8; color: white; }
    .btn-success { background-color: #28a745; color: white; }
    .btn-danger { background-color: #dc3545; color: white; }
</style>

<div class="container mt-4">
    <h1>Forums</h1>
    <a href="{{ route('forums.create') }}" class="btn btn-secondary mb-3">Create New Forum</a>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-3">
            {{ $message }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Posts Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forums as $forum)
            <tr>
                <td>{{ $forum->title }}</td>
                <td>{{ $forum->posts->count() }}</td>
                <td>
                    <a href="{{ route('forums.show', $forum->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('forums.posts.index', $forum->id) }}" class="btn btn-secondary">View Posts</a>
                    <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection