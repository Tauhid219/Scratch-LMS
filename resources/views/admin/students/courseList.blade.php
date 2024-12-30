@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container my-4">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">{{ $course->title }}</h5>
                                <a href="" class="btn btn-primary">Enroll</a>
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
