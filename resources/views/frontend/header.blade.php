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
                <div class="container mx-auto flex items-center justify-between p-3">
                    <!-- Hamburger Menu for Small Screens -->
                    <div class="dropdown md:hidden">
                        <label tabindex="0" class="btn btn-ghost" id="hamburger-menu">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32-14.3 32 32z">
                                </path>
                            </svg>
                        </label>
                        <ul
                            class="dropdown-content hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                            <li><a href="{{ route('home') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About us</a></li>
                            <li><a href="{{ route('olympiad') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Olympiad</a></li>
                            <li><a href="https://scratch.mit.edu/projects/editor/?tutorial=getStarted"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Learn</a></li>
                            <li><a href="{{ route('blog') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Logo -->
                    <a href="/" class="flex-shrink-0">
                        <img src="/assets/img/scratch-bd-nav-logo.png" class="md:w-16 w-12" alt="Logo" />
                    </a>

                    <!-- Navigation Menu for Medium and Large Screens -->
                    <ul class="hidden md:flex text-lg font-semibold gap-10">
                        <li><a href="{{ route('home') }}" class="hover:text-gray-600">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-gray-600">About us</a></li>
                        <li><a href="{{ route('olympiad') }}" class="hover:text-gray-600">Olympiad</a></li>
                        <li><a href="https://scratch.mit.edu/projects/editor/?tutorial=getStarted"
                                class="hover:text-gray-600">Learn</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-gray-600">Blog</a></li>
                    </ul>

                    <!-- User Icon -->
                    <div class="relative">
                        <!-- Logged out state: Show Login button -->
                        @guest
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600">
                                Login
                            </a>
                        @endguest

                        <!-- Logged in state: Show profile photo and dropdown -->
                        @auth
                            <div class="w-7 md:w-10 rounded-full cursor-pointer" id="user-icon">
                                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png' }}"
                                    class="rounded-full" />
                            </div>

                            <!-- Dropdown menu -->
                            <div class="dropdown-content hidden absolute right-0 w-48 bg-white rounded-md shadow-lg z-20"
                                id="dropdown-menu">
                                <ul class="py-1">
                                    <li>
                                        <a href="{{ route('profile-details.index') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('mydashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <script>
                // Hamburger menu toggle for small devices
                const hamburgerMenu = document.getElementById('hamburger-menu');
                const dropdownMenu = hamburgerMenu.nextElementSibling;

                hamburgerMenu.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });

                // User icon dropdown toggle on click
                const userIcon = document.getElementById('user-icon');
                const userDropdown = userIcon.nextElementSibling;

                userIcon.addEventListener('click', function() {
                    userDropdown.classList.toggle('hidden');
                });

                // Close the dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userIcon.contains(event.target) && !userDropdown.contains(event.target)) {
                        userDropdown.classList.add('hidden');
                    }
                });
            </script>
