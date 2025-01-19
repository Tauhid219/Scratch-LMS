@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <aside id="sidebar" class="sidebar">
                    <ul class="sidebar-nav">

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="{{ route('home') }}#courses">
                                <i class="bi bi-journal-bookmark"></i>
                                <span>Courses</span>
                            </a>
                        </li><!-- End Courses Nav -->

                        @foreach ($lessons as $lesson)
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="{{ route('stdc.showLesson', $lesson->id) }}">
                                    <i class="bi bi-journal-text"></i>
                                    <span>{{ $lesson->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $course->title }}</h3>
                        <p>{{ $course->description }}</p>
                        <p><strong>Duration:</strong> {{ $course->duration }} hours</p>
                        <p><strong>Instructor:</strong> {{ $course->instructor }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
