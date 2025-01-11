<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('mydashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('stdc.index') }}">
                <i class="bi bi-journal-bookmark"></i>
                <span>Courses</span>
            </a>
        </li><!-- End Courses Nav -->

        @role('super-admin|instructor')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('courses.index') }}">
                    <i class="bi bi-journal-bookmark"></i>
                    <span>Manage Courses</span>
                </a>
            </li><!-- End Courses Nav -->
        @endrole

        {{-- @role('super-admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('lessons.index') }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Manage Lessons</span>
                </a>
            </li><!-- End Lessons Nav -->
        @endrole --}}

        @role('super-admin|instructor')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('category.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Categories</span>
                </a>
            </li><!-- End Categories Nav -->
        @endrole

        @role('super-admin|instructor')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('languages.index') }}">
                    <i class="bi bi-translate"></i>
                    <span>Languages</span>
                </a>
            </li><!-- End Languages Nav -->
        @endrole

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            {{-- <a class="nav-link collapsed" href="{{ url('profile') }}"> --}}
            <a class="nav-link collapsed" href="{{ route('profile-details.index') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        @role('super-admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('rolepermission-page') }}">
                    <i class="bi bi-shield-lock"></i>
                    <span>Role & Permission</span>
                </a>
            </li><!-- End Role Permission Page Nav -->
        @endrole

        <li class="nav-item">
            <a class="nav-link collapsed" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li><!-- End Logout Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
