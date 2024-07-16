@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-secondary mt-3">Create New Category</a>
    
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    
    <table>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary mt-3">View</a>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary mt-3">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary mt-3">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection