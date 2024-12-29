<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body data-new-gr-c-s-check-loaded="14.1215.0" data-gr-ext-installed="">
    <div id="root">
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
                    <div class="hidden md:flex">
                        <ul class="menu menu-horizontal text-lg font-semibold px-1">
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
                        <div class="dropdown dropdown-end">
                            <div class="tooltip tooltip-left" data-tip="User Name">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="md:w-10 w-7 rounded-full">
                                        <img
                                            src="https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png" />
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div>
                                <div class="pl-0 relative flex" aria-label="usermenu" data-headlessui-state="">
                                    <button class="group w-full text-lg text-left text-gray-700 focus:outline-none"
                                        aria-label="usermenu-button" id="headlessui-menu-button-:r0:" type="button"
                                        aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                        <span class="flex items-center gap-1"><svg stroke="currentColor"
                                                fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5v39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9v39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7v-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1H257c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
                                                </path>
                                            </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 448 512" class="text-xs" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                                </path>
                                            </svg></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
