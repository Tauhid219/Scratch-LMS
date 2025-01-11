@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        {{-- <div class="container my-4">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">{{ $course->title }}</h5>
                                <a href="{{ route('stdc.enroll', $course->id) }}" class="btn btn-primary">Enroll</a>
                                <a href="{{ route('stdc.open', $course->id) }}" class="btn btn-primary">Open Course</a>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ Str::limit($course->description, 100, '...') }}
                                </p>
                                <p class="text-muted">
                                    <strong>Instructor:</strong> {{ $course->instructor }}
                                </p>
                                <p class="text-muted">
                                    <strong>Duration:</strong> {{ $course->duration }} hours
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <div class="container my-4">
            <div class="row">
                @foreach ($courses as $course)
                    @php
                        $isEnrolled = App\Models\Enrollment::where('student_id', auth()->id())
                            ->where('course_id', $course->id)
                            ->exists();
                    @endphp

                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">{{ $course->title }}</h5>

                                @if ($isEnrolled || auth()->user()->hasRole('super-admin|instructor'))
                                    <button class="btn btn-secondary" disabled>Enrolled</button>
                                    <a href="{{ route('stdc.open', $course->id) }}" class="btn btn-primary">Open Course</a>
                                @else
                                    <form action="{{ route('stdc.enroll', $course->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Enroll</button>
                                    </form>
                                @endif
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ Str::limit($course->description, 100, '...') }}
                                </p>
                                <p class="text-muted">
                                    <strong>Instructor:</strong> {{ $course->instructor }}
                                </p>
                                <p class="text-muted">
                                    <strong>Duration:</strong> {{ $course->duration }} hours
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main><!-- End #main -->
@endsection
