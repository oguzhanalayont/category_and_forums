@extends('layouts.app')

@section('content')
    <h1>Forum Details</h1>
    
    <div>
        <strong>Name:</strong>
        {{ $forum->name }}
    </div>
    
    <a href="{{ route('forums.index') }}">Back to Forums</a>
    <a href="{{ route('forums.edit', $forum->id) }}">Edit</a>
@endsection