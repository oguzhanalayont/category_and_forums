@extends('layouts.app')

@section('content')
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
        <button type="submit" class="btn btn-primary">Update Forum</button>
    </form>
@endsection