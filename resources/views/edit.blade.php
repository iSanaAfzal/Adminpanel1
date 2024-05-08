@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center"> <!-- Container with centering -->
        <div class="col-6"> <!-- Column width of col-6 -->
            <h2 class="mb-4">Edit Category</h2>

            <div class="card">
                <div class="card-body">
                    <!-- Form starts -->
                    <form action="{{ route('categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name" value="{{ $category->name }}">
                        </div>

                        <!-- Slug Field -->
                        <div class="form-group mb-3">
                            <label for="slug" class="form-label text-dark">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                placeholder="Enter Slug" value="{{ $category->slug }}">
                        </div>

                        <!-- Thumbnail Field -->
                        <div class="form-group mb-3">
                            <label for="thumbnail" class="form-label text-dark">Thumbnail</label>
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                            @if ($category->thumbnail)
                                <img src="{{ asset($category->thumbnail) }}" alt="Category Thumbnail" width="50"
                                    class="mt-2">
                            @endif
                        </div>

                        <!-- Status Field -->
                        <div class="form-group mb-3">
                            <label for="status" class="form-label text-dark">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                    <!-- Form ends -->
                </div> <!-- Card body ends -->
            </div>

            <!-- Column width of col-6 ends -->
        </div> <!-- Container with centering ends -->
    @endsection
