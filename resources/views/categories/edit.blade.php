@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
    <h1>Edit Category</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $forum->description ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Update Category</button>
    </form>
@endsection