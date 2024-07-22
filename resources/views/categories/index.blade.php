@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #d1ecf1;
    }
</style>
<div class="container mt-4">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-secondary mb-3">Create New Category</a>
    
    <!-- Başarı mesajlarını göstermek için Toastr ile ilgili div -->
    @if (session('success'))
        <div id="notification-message" data-type="success" style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Forums Count</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->forums->count() }}</td>
                <td>{{ Str::limit($category->description ?? '', 100) }}</td>
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const notificationMessage = document.getElementById('notification-message');
    const type = notificationMessage?.dataset.type;

    if (notificationMessage && type) {
        toastr[type](notificationMessage.innerText);
    }
});
</script>
@endsection
@endsection
