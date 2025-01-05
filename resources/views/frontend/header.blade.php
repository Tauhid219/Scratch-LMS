<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div>
            <div class="bg-opacity-70 min-w-full backdrop-blur-md bg-[#F4F1F1] fixed z-10 text-black">
                <div class="container mx-auto flex items-center justify-between">
                    <div class="dropdown md:hidden">
                        <label tabindex="0" class="btn btn-ghost"><svg stroke="currentColor" fill="currentColor"
                                stroke-width="0" viewBox="0 0 448 512" class="text-xl" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
                                </path>
                            </svg></label>
                    </div>
                    <div class="p-3">
                        <a class="" href="/"><img src="https://i.ibb.co/qd28TJX/scratch-bd-nav-logo.png"
                                class="md:w-16 w-16" /></a>
                    </div>
                    <div class="">
                        <ul class="text-lg font-semibold flex gap-10">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('olympiad') }}">Olympiad</a></li>
                            <li>
                                <a href="https://scratch.mit.edu/projects/editor/?tutorial=getStarted">Learn</a>
                            </li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                    <div class="flex items-center gap-5 md:mr-5">
                        <div class="relative">
                            <div class="md:w-10 w-7 rounded-full">
                                <img
                                    src="https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png" 
                                    id="user-icon" class="rounded-full"/>
                            </div>
                            <div class="dropdown-content hidden absolute right-0 w-48 bg-white rounded-md shadow-lg z-20">
                                <ul class="py-1">
                                    <li><a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a></li>
                                    <li><a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a></li>
                                    <li><a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <script>
                    const userIcon = document.getElementById('user-icon');
                    const dropdownContent = document.querySelector('.dropdown-content');

                    userIcon.addEventListener('mouseover', function() {
                        dropdownContent.classList.remove('hidden');
                    });

                    userIcon.addEventListener('mouseout', function() {
                        setTimeout(function() {
                            if (!dropdownContent.matches(':hover')) {
                                dropdownContent.classList.add('hidden');
                            }
                        }, 100);
                    });

                    dropdownContent.addEventListener('mouseover', function() {
                        dropdownContent.classList.remove('hidden');
                    });

                    dropdownContent.addEventListener('mouseout', function() {
                        dropdownContent.classList.add('hidden');
                    });
                </script>
                </div>
            </div>
