@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
    <h1>Forums</h1>
    <a href="{{ route('forums.create') }}">Create New Forum</a>
    
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    
    <table>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($forums as $forum)
        <tr>
            <td>{{ $forum->name }}</td>
            <td>
                <a href="{{ route('forums.show', $forum->id) }}">View</a>
                <a href="{{ route('forums.edit', $forum->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $forum->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection