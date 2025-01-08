@extends('frontend.layout')
@section('main-content')
<div class="min-h-[calc(100vh-239px)]">
    <div>
        @include('frontend.hero')

        <div class="container mx-auto px-5 items-center grid-cols-2 gap-16 md:grid pt-14">
            <div class="">
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/js-WmIvAtWU?si=TtF90DBYmlYUTdSM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            
            </div>
            <div class="text-center md:text-left">
                <h1 class="my-3 md:text-6xl text-4xl font-bold">
                    Scratch Bangladesh
                </h1>
                <p class="my-5 md:text-lg">
                    Scratch is a block-based programming language through which
                    People of any age, from elementary school students Can easily
                    learn programming logic and besides games, animation videos,
                    art Various projects can be created. Scratch is used in more
                    than 70 languages and more than 200 countries around the
                    world. Since 2021, Scratch is also being used in Bengali
                    language. Currently there is an offline desktop version of
                    Scratch available in Bengali along with the main website and
                    Scratch editor.
                </p>
                <div>
                    <a href="/classes"><button class="btn-primary">
                            Learn Scratch in Bangla
                        </button></a>
                </div>
            </div>
        </div>

        @include('frontend.featureProjects')

        @include('frontend.courses')

        <div class="container mx-auto my-14 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">
        Frequently Asked Questions
    </h1>
    <div class="md:grid grid-cols-3 items-center gap-8">
        <!-- FAQ Accordion -->
        <div class="col-span-2 space-y-4">
            <!-- Question 1 -->
            <div class="border rounded-lg overflow-hidden">
                <div 
                    class="bg-gray-200 p-4 cursor-pointer font-semibold text-gray-800" 
                    onclick="toggleAccordion(1)">
                    What is Scratch, and what can I do with it?
                </div>
                <div 
                    id="accordion-1" 
                    class="hidden p-4 text-gray-700 bg-gray-50">
                    Scratch is a programming language and community where you can create interactive stories, games, and animations.
                </div>
            </div>
            <!-- Question 2 -->
            <div class="border rounded-lg overflow-hidden">
                <div 
                    class="bg-gray-200 p-4 cursor-pointer font-semibold text-gray-800" 
                    onclick="toggleAccordion(2)">
                    Who uses Scratch?
                </div>
                <div 
                    id="accordion-2" 
                    class="hidden p-4 text-gray-700 bg-gray-50">
                    Scratch is used by people worldwide, especially for young people aged 8-16, but anyone can use it.
                </div>
            </div>
            <!-- Question 3 -->
            <div class="border rounded-lg overflow-hidden">
                <div 
                    class="bg-gray-200 p-4 cursor-pointer font-semibold text-gray-800" 
                    onclick="toggleAccordion(3)">
                    What are the system requirements for Scratch?
                </div>
                <div 
                    id="accordion-3" 
                    class="hidden p-4 text-gray-700 bg-gray-50">
                    Scratch runs on most web browsers on desktops, laptops, and tablets. It cannot be edited on mobile phones.
                </div>
            </div>
            <!-- Question 4 -->
            <div class="border rounded-lg overflow-hidden">
                <div 
                    class="bg-gray-200 p-4 cursor-pointer font-semibold text-gray-800" 
                    onclick="toggleAccordion(4)">
                    Can I upload projects created with older versions of Scratch?
                </div>
                <div 
                    id="accordion-4" 
                    class="hidden p-4 text-gray-700 bg-gray-50">
                    Yes, older Scratch projects can be uploaded and played, but they cannot be opened in older versions of Scratch.
                </div>
            </div>
            <!-- Question 5 -->
            <div class="border rounded-lg overflow-hidden">
                <div 
                    class="bg-gray-200 p-4 cursor-pointer font-semibold text-gray-800" 
                    onclick="toggleAccordion(5)">
                    Do you have a downloadable version?
                </div>
                <div 
                    id="accordion-5" 
                    class="hidden p-4 text-gray-700 bg-gray-50">
                    The Scratch app allows you to create and edit projects offline. Download it from the Scratch website or app store.
                </div>
            </div>
        </div>
        <!-- FAQ Illustration -->
        <div class="hidden md:block col-span-1">
            <img 
                src="https://bechofy.in/img/hero-img/faq.png" 
                alt="FAQ Illustration" 
                class="w-full">
        </div>
    </div>
</div>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(`accordion-${id}`);
        const isVisible = !content.classList.contains('hidden');
        
        // Close all accordions
        document.querySelectorAll('[id^="accordion-"]').forEach(item => item.classList.add('hidden'));

        // Open the clicked accordion if it was closed
        if (!isVisible) {
            content.classList.remove('hidden');
        }
    }
</script>
    </div>
</div>
@endsection