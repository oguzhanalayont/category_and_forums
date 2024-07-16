@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Category: {{ $category->name }}</h1>
    
    <a href="{{ route('forums.create', ['category_id' => $category->id]) }}" class="btn btn-primary mb-3">Create New Forum</a>
    
    <h2>Forums in this category:</h2>
    @if($category->forums->count() > 0)
        <ul class="list-group">
            @foreach($category->forums as $forum)
                <li class="list-group-item">
                    <a href="{{ route('forums.show', $forum->id) }}">{{ $forum->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No forums in this category yet.</p>
    @endif
    
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
</div>
@endsection