<div class=''>
    <h1 class="md:text-5xl text-3xl text-center font-bold md:mt-20 mt-10 pb-10">
        Courses
    </h1>
    <div class="md:grid grid-cols-2 gap-10 container mx-auto p-3">
        @if (session('success'))
            <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded shadow-lg z-50">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($courses as $course)
            @php
                $isEnrolled = auth()->check()
                    ? App\Models\Enrollment::where('student_id', auth()->id())
                        ->where('course_id', $course->id)
                        ->exists()
                    : false;
            @endphp

            <div
                class="relative flex flex-col bg-clip-border rounded-xl text-gray-700 shadow-md overflow-hidden bg-slate-50 border p-4 hover:shadow-lg hover:shadow-orange-400">
                <div
                    class="relative bg-clip-border overflow-hidden bg-transparent text-gray-700 shadow-none m-0 rounded-none">
                    <div class="relative h-64 rounded overflow-hidden">
                        <!-- Course Thumbnail -->
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-110" />
                    </div>
                </div>
                <div class="md:flex justify-between items-center">
                    <div class="text-center text-black md:text-left">
                        <h1 class="my-3 md:text-xl text-lg font-semibold uppercase">
                            {{ $course->title }}
                        </h1>
                        <p>Category: {{ $course->category->name }}</p>
                        <p class="text-sm opacity-40">Price: ${{ $course->price }}</p>
                    </div>
                    <div class="flex justify-center items-center">
                        @if (auth()->check() && ($isEnrolled || auth()->user()->hasRole('super-admin|instructor')))
                            <a class="btn text-xl btn-primary" href="{{ route('stdc.open', $course->id) }}">Start
                                Now</a>
                        @elseif (auth()->check())
                            <form action="{{ route('stdc.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn text-xl btn-primary">Enroll</button>
                            </form>
                        @else
                            <a class="btn text-xl btn-secondary" href="{{ route('login') }}">Login to Enroll</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 500);
            }, 3000);
        }
    });
</script>
