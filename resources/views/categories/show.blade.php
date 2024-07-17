@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Category: {{ $category->name }}</h1>
    
    <a href="{{ route('forums.create', ['category_id' => $category->id]) }}" class="btn btn-secondary mb-3">Create New Forum</a>
    
    <h2>Forums in this category:</h2>
    @if($category->forums->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->forums as $forum)
                <tr>
                    <td>{{ $forum->title }}</td>
                    <td>
                        <a href="{{ route('forums.show', $forum->id) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to delete this forum?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No forums in this category yet.</p>
    @endif
    
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
</div>
@endsection