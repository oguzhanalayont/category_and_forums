@extends('layouts.app')

@section('content')
    <h1>Edit Forum</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('forums.update', $forum->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $forum->name }}" required>
        </div>
        <button type="submit">Update Forum</button>
    </form>
@endsection