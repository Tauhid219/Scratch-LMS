@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>Edit Lesson</h1>

            <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $lesson->slug }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="5">{{ $lesson->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="url" name="video_url" id="video_url" class="form-control"
                        value="{{ $lesson->video_url }}">
                </div>

                <div class="mb-3">
                    <label for="resource_files" class="form-label">Resource Files</label>
                    <input type="file" name="resource_files[]" id="resource_files" class="form-control" multiple>
                    <p class="mt-2">Existing Files:</p>
                    <ul>
                        @if ($lesson->resource_files)
                            @foreach (json_decode($lesson->resource_files, true) as $file)
                                <li><a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a></li>
                            @endforeach
                        @else
                            <li>No files uploaded.</li>
                        @endif
                    </ul>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration (in minutes)</label>
                    <input type="number" name="duration" id="duration" class="form-control"
                        value="{{ $lesson->duration }}">
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="number" name="order" id="order" class="form-control" value="{{ $lesson->order }}">
                </div>

                <div class="mb-3">
                    <label for="course_id" class="form-label">Course</label>
                    <select name="course_id" id="course_id" class="form-control" required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $course->id == $lesson->course_id ? 'selected' : '' }}>
                                {{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="language_id" class="form-label">Language</label>
                    <select name="language_id" id="language_id" class="form-control" required>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}"
                                {{ $language->id == $lesson->language_id ? 'selected' : '' }}>{{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Lesson</button>
                <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

    </main><!-- End #main -->
@endsection
