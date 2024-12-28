@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>Edit Course</h1>
            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $course->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                        value="{{ old('slug', $course->slug) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    @if ($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Thumbnail" class="mt-2"
                            width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control"
                        value="{{ old('price', $course->price) }}" required>
                </div>

                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="number" name="discount_price" id="discount_price" class="form-control"
                        value="{{ old('discount_price', $course->discount_price) }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Draft" {{ old('status', $course->status) == 'Draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="Published" {{ old('status', $course->status) == 'Published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="Archived" {{ old('status', $course->status) == 'Archived' ? 'selected' : '' }}>
                            Archived</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="Beginner" {{ old('level', $course->level) == 'Beginner' ? 'selected' : '' }}>
                            Beginner</option>
                        <option value="Intermediate"
                            {{ old('level', $course->level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ old('level', $course->level) == 'Advanced' ? 'selected' : '' }}>
                            Advanced</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="language_id" class="form-label">Language</label>
                    <select name="language_id" id="language_id" class="form-control" required>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}"
                                {{ old('language_id', $course->language_id) == $language->id ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration (in minutes)</label>
                    <input type="number" name="duration" id="duration" class="form-control"
                        value="{{ old('duration', $course->duration) }}">
                </div>

                <div class="mb-3">
                    <label for="certificate" class="form-label">Certificate</label>
                    <input type="checkbox" name="certificate" id="certificate"
                        {{ old('certificate', $course->certificate) ? 'checked' : '' }}>
                    <small class="form-text text-muted">Enable certificate for this course</small>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" step="0.1" name="rating" id="rating" class="form-control"
                        value="{{ old('rating', $course->rating) }}">
                </div>

                <div class="mb-3">
                    <label for="enrollment_limit" class="form-label">Enrollment Limit</label>
                    <input type="number" name="enrollment_limit" id="enrollment_limit" class="form-control"
                        value="{{ old('enrollment_limit', $course->enrollment_limit) }}">
                </div>

                <div class="mb-3">
                    <label for="created_by" class="form-label">Created By</label>
                    <select name="created_by" id="created_by" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('created_by', $course->created_by) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="live_class_enabled" class="form-label">Enable Live Class</label>
                    <input type="checkbox" name="live_class_enabled" id="live_class_enabled"
                        {{ old('live_class_enabled', $course->live_class_enabled) ? 'checked' : '' }}>
                    <small class="form-text text-muted">Enable live classes for this course</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
        </div>

    </main><!-- End #main -->
@endsection
