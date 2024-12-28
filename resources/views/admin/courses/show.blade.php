@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>{{ $course->title }}</h1>

            <p><strong>Category:</strong> {{ $course->category->name }}</p>
            <p><strong>Language:</strong> {{ $course->language->name }}</p>
            <p><strong>Status:</strong> {{ $course->status }}</p>
            <p><strong>Level:</strong> {{ $course->level }}</p>
            <p><strong>Price:</strong> ${{ $course->price }}</p>
            <p><strong>Discount Price:</strong> ${{ $course->discount_price }}</p>

            <div>
                <strong>Description:</strong>
                <p>{{ $course->description }}</p>
            </div>

            @if ($course->thumbnail)
                <div>
                    <strong>Thumbnail:</strong>
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Thumbnail" width="200">
                </div>
            @endif

            <p><strong>Rating:</strong> {{ $course->rating ?? 'N/A' }}</p>
            <p><strong>Enrollment Limit:</strong> {{ $course->enrollment_limit ?? 'N/A' }}</p>
            <p><strong>Duration:</strong> {{ $course->duration ?? 'N/A' }} minutes</p>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>
        </div>

    </main><!-- End #main -->
@endsection
