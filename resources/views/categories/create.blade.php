@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
    <h1>Create New Category</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $forum->description ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-secondary mb-2">Create Category</button>
    </form>
@endsection