@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>{{ $lesson->title }}</h1>

            <p><strong>Course:</strong> {{ $lesson->course->title }}</p>
            <p><strong>Language:</strong> {{ $lesson->language->name }}</p>
            <p><strong>Content:</strong></p>
            <p>{!! nl2br(e($lesson->content)) !!}</p>

            @if ($lesson->video_url)
                <p><strong>Video:</strong></p>
                @if (Str::contains($lesson->video_url, 'youtube.com') || Str::contains($lesson->video_url, 'youtu.be'))
                    @php
                        // Convert to embeddable URL
                        $embedUrl = Str::contains($lesson->video_url, 'watch?v=')
                            ? str_replace('watch?v=', 'embed/', $lesson->video_url)
                            : (Str::contains($lesson->video_url, 'youtu.be')
                                ? str_replace('youtu.be/', 'www.youtube.com/embed/', $lesson->video_url)
                                : $lesson->video_url);
                    @endphp
                    <iframe width="560" height="315" src="{{ $embedUrl }}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                @else
                    <video width="100%" height="auto" controls>
                        <source src="{{ $lesson->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @endif

            @if ($lesson->resource_files)
                <p><strong>Resource Files:</strong></p>
                <ul>
                    @foreach (json_decode($lesson->resource_files, true) as $file)
                        <li><a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a></li>
                    @endforeach
                </ul>
            @endif

            <p><strong>Duration:</strong> {{ $lesson->duration ? $lesson->duration . ' minutes' : 'N/A' }}</p>
            <p><strong>Order:</strong> {{ $lesson->order }}</p>

            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

    </main><!-- End #main -->
@endsection
