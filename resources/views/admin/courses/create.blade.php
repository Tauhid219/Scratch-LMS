@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>Create New Course</h1>
            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="" selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="number" name="discount_price" id="discount_pricee" class="form-control"
                        value="{{ old('discount_price') }}" required>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Draft">
                            Draft</option>
                        <option value="Published">Published
                        </option>
                        <option value="Archived">Archived
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="Beginner">Beginner
                        </option>
                        <option value="Intermediate">
                            Intermediate</option>
                        <option value="Advanced">Advanced
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="language_id" class="form-label">Language</label>
                    <select name="language_id" id="language_id" class="form-control" required>
                        <option value="" selected disabled>Select a language</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="duration">Duration (in minutes)</label>
                    <input type="number" name="duration" id="duration" class="form-control"
                        value="{{ old('duration') }}">
                </div>
                <div class="mb-3">
                    <label for="certificate">Certificate</label>
                    <input type="checkbox" name="certificate" id="certificate">
                    <small class="form-text text-muted">Enable certificate for this course</small>
                </div>
                <div class="mb-3">
                    <label for="rating">Rating</label>
                    <input type="number" step="0.1" name="rating" id="rating" class="form-control"
                        value="{{ old('rating') }}">
                </div>
                <div class="mb-3">
                    <label for="enrollment_limit">Enrollment Limit</label>
                    <input type="number" name="enrollment_limit" id="enrollment_limit" class="form-control"
                        value="{{ old('enrollment_limit') }}">
                </div>
                <div class="mb-3">
                    <label for="created_by">Created By</label>
                    <select name="created_by" id="created_by" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="live_class_enabled">Enable Live Class</label>
                    <input type="checkbox" name="live_class_enabled" id="live_class_enabled">
                    <small class="form-text text-muted">Enable live classes for this course</small>
                </div>
                <button type="submit" class="btn btn-primary">Create Course</button>
            </form>
        </div>

    </main><!-- End #main -->
@endsection
