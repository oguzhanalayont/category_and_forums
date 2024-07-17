@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
</style>
<div class="container mt-4">
    <h1 class="mb-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-secondary mb-3">Create New Category</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Forums Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->forums_count }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary btn-sm">View</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
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