@extends('frontend.layout')
@section('main-content')
<div class="min-h-[calc(100vh-239px)]">
    <div>
        @include('frontend.hero')

        <div class="container items-center grid-cols-2 gap-16 md:grid pt-14 mx-auto">
            <div class="">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/Bs4bNZRo28Q?si=EahUPgogqkpxl7nI"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
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
                    <a href="/classes"><button class="btn text-lg border py-2 px-4 bg-blue-300 duration-300 rounded-lg hover:bg-blue-500">
                            Learn Scratch in Bangla
                        </button></a>
                </div>
            </div>
        </div>

        @include('frontend.featureProjects')

        @include('frontend.courses')

        <div class="container mx-auto my-14 p-3">
            <h1 class="md:text-5xl text-2xl text-center font-bold mb-14">
                Frequently Ask Question
            </h1>
            <div class="md:grid grid-cols-3 items-center justify-center gap-5">
                <div class="space-y-3 col-span-2">
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" checked="" />
                        <div class="collapse-title font-medium">
                            What is Scratch, and what can I do with it?
                        </div>
                        <div class="collapse-content">
                            <p>
                                With the Scratch programming language and online
                                community, you can create your own interactive stories,
                                games, and animations -- and share your creations with
                                others around the world. As young people create and
                                share Scratch projects, they learn to think creatively,
                                reason systematically, and work collaboratively. To
                                learn more about Scratch, see the About Scratch page.
                            </p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title font-medium">
                            Who uses Scratch?
                        </div>
                        <div class="collapse-content">
                            <p>
                                Scratch is used by people from all backgrounds, in all
                                countries around the world, in all types of settings --
                                homes, schools, libraries, museums, and more. Scratch is
                                designed especially for young people ages 8 to 16, but
                                people of all ages create and share with Scratch.
                                Younger children may want to try ScratchJr, a simplified
                                version of Scratch designed for ages 5 to 7.
                            </p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title font-medium">
                            What are the system requirements for Scratch?
                        </div>
                        <div class="collapse-content">
                            <p>
                                Scratch will run in most current web browsers on
                                desktops, laptops and tablets. You can view projects on
                                mobile phones, but currently you are not able to create
                                or edit projects on phones. Below is the list of
                                officially supported browsers.
                            </p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title font-medium">
                            Can I still upload projects created with older versions of
                            Scratch to the website?
                        </div>
                        <div class="collapse-content">
                            <p>
                                es: You can share or upload projects made with earlier
                                versions of Scratch, and they will be visible and
                                playable. (However, you can’t download projects made
                                with or edited in later versions of Scratch and open
                                them in earlier versions. For example, you can’t open a
                                Scratch 3.0 project in the desktop version of Scratch
                                2.0, because Scratch 2.0 doesn’t know how to read the
                                .sb3 project file format.)
                            </p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title font-medium">
                            Do you have a downloadable version so I can create and
                            view projects offline?
                        </div>
                        <div class="collapse-content">
                            <p>
                                The Scratch app allows you to create Scratch projects
                                without an internet connection. You can download the
                                Scratch app from the Scratch website or the app store
                                for your device. (This was previously called the Scratch
                                Offline Editor.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <img src="https://bechofy.in/img/hero-img/faq.png" alt="" class="w-full mt-5" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection