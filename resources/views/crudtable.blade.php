@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-dark text-white">
                        <h3 class="mb-0">Category List</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('category.form') }}" class="btn btn-primary">Submit Category</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->thumbnail)
                                                <img src="{{ asset($category->thumbnail) }}" alt="Category Thumbnail"
                                                    class="img-thumbnail"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Thumbnail</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $category->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($category->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-outline-warning me-2">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
