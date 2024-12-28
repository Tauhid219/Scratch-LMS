@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center mb-4">{{ $course->title }}</h1>

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Course Details</h5>
                            <hr>
                            <p><strong>Category:</strong> <span class="text-muted">{{ $course->category->name }}</span></p>
                            <p><strong>Language:</strong> <span class="text-muted">{{ $course->language->name }}</span></p>
                            <p><strong>Status:</strong> <span class="text-muted">{{ $course->status }}</span></p>
                            <p><strong>Level:</strong> <span class="text-muted">{{ $course->level }}</span></p>
                            <p><strong>Price:</strong> <span
                                    class="text-muted">${{ number_format($course->price, 2) }}</span></p>
                            <p><strong>Discount Price:</strong> <span
                                    class="text-muted">${{ number_format($course->discount_price, 2) }}</span></p>

                            <div class="mb-4">
                                <strong>Description:</strong>
                                <p class="text-muted">{{ $course->description }}</p>
                            </div>

                            @if ($course->thumbnail)
                                <div class="mb-4">
                                    <strong>Thumbnail:</strong>
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Thumbnail"
                                        class="img-fluid" width="200">
                                </div>
                            @endif

                            <p><strong>Rating:</strong> <span class="text-muted">{{ $course->rating ?? 'N/A' }}</span></p>
                            <p><strong>Enrollment Limit:</strong> <span
                                    class="text-muted">{{ $course->enrollment_limit ?? 'N/A' }}</span></p>
                            <p><strong>Duration:</strong> <span class="text-muted">{{ $course->duration ?? 'N/A' }}
                                    minutes</span></p>
                        </div>
                    </div>

                    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">Back to Courses</a>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
