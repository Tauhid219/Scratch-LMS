<div class=''>
    <h1 class="md:text-5xl text-3xl text-center font-bold md:mt-20 mt-10 pb-10">
        Courses
    </h1>
    <div class="md:grid grid-cols-2 gap-10 container mx-auto p-3">
        @foreach ($courses as $course)
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
                        <!-- Course Title -->
                        <h1 class="my-3 md:text-xl text-lg font-semibold uppercase">
                            {{ $course->title }}
                        </h1>
                        <!-- Course Category -->
                        <p>Category: {{ $course->category->name }}</p>
                        <!-- Course Price -->
                        <p class="text-sm opacity-40">Price: ${{ $course->price }}</p>
                    </div>
                    <div class="flex justify-center items-center">
                        <!-- Link to Course Page or Enroll Now -->
                        <a class="btn text-xl btn-primary" href="/">Start Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- <div class=''>
    <h1 class="md:text-5xl text-3xl text-center font-bold md:mt-20 mt-10 pb-10">
        Courses
    </h1>
    <div class="md:grid grid-cols-2 gap-10 container mx-auto p-3">
        <div
            class="relative flex flex-col bg-clip-border rounded-xl text-gray-700 shadow-md overflow-hidden bg-slate-50 border p-4 hover:shadow-lg hover:shadow-orange-400">
            <div
                class="relative bg-clip-border overflow-hidden bg-transparent text-gray-700 shadow-none m-0 rounded-none">
                <div class="relative h-64 rounded overflow-hidden">
                    <img src="https://img.youtube.com/vi/-hKHd2fLANo/maxresdefault.jpg" alt="{card.title}"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110" />
                </div>
            </div>
            <div class="md:flex justify-between items-center">
                <div class="text-center text-black md:text-left">
                    <h1 class="my-3 md:text-xl text-lg font-semibold uppercase">
                        Scratch programming for everyone
                    </h1>
                    <p>Categories: Scratch Basic</p>
                    <p class="text-sm opacity-40">video tutorial | Paid</p>
                </div>
                <div class="flex justify-center items-center">
                    <a class="btn text-xl btn-primary" href="/">Start Now</a>
                </div>
            </div>
        </div>
        <div
            class="relative flex flex-col bg-clip-border rounded-xl text-gray-700 shadow-md overflow-hidden md:mt-0 mt-5 bg-slate-50 border p-4 hover:shadow-lg hover:shadow-orange-400">
            <div
                class="relative bg-clip-border overflow-hidden bg-transparent text-gray-700 shadow-none m-0 rounded-none">
                <div class="relative h-64 rounded overflow-hidden">
                    <img src="https://img.youtube.com/vi/O6C0E0PTucE/maxresdefault.jpg"
                        alt="{card.title}"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110" />
                </div>
            </div>
            <div class="md:flex justify-between items-center">
                <div class="text-center text-black md:text-left">
                    <h1 class="my-3 md:text-xl text-lg font-semibold uppercase">
                        Scratch programming for everyone
                    </h1>
                    <p>Categories: Scratch Basic</p>
                    <p class="text-sm opacity-40">video tutorial | Paid</p>
                </div>
                <div class="flex justify-center items-center">
                    <a class="btn text-xl btn-primary" href="/">Start Now</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
