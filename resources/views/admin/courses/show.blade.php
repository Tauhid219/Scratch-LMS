@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        {{-- <div class="container mt-5">
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
        </div> --}}

        {{-- <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center mb-4">{{ $course->title }}</h1>

                    <!-- Course Details -->
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

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Lessons List -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Lessons for "{{ $course->title }}"</h5>
                            <hr>
                            <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}"
                                class="btn btn-success mb-3">
                                Add New Lesson
                            </a>
                            @if ($course->lessons->isEmpty())
                                <p class="text-muted">No lessons available for this course.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->lessons as $lesson)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lesson->title }}</td>
                                                <td>{{ $lesson->order }}</td>
                                                <td>
                                                    <a href="{{ route('lessons.show', $lesson->id) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('lessons.edit', $lesson->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('lessons.destroy', $lesson->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">Back to Courses</a>
                </div>
            </div>
        </div> --}}

        <div class="container mt-5">
            <div class="row">
                <h1 class="text-center mb-4">{{ $course->title }}</h1>
                <!-- Course Details Column -->
                <div class="col-md-6">
                    {{-- <h1 class="text-center mb-4">{{ $course->title }}</h1> --}}

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
                </div>

                <!-- Lessons List Column -->
                <div class="col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Lessons for "{{ $course->title }}"</h5>
                            <hr>
                            <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}"
                                class="btn btn-success mb-3">
                                Add New Lesson
                            </a>
                            @if ($course->lessons->isEmpty())
                                <p class="text-muted">No lessons available for this course.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->lessons as $lesson)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lesson->title }}</td>
                                                <td>{{ $lesson->order }}</td>
                                                <td>
                                                    <a href="{{ route('lessons.show', $lesson->id) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('lessons.edit', $lesson->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('lessons.destroy', $lesson->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
