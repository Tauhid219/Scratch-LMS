@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $user->bio }}</h3>
                            <div class="social-links mt-2">
                                @if ($user->social_links)
                                    @foreach (json_decode($user->social_links, true) as $platform => $link)
                                        <a href="{{ $link }}" target="_blank" class="{{ $platform }}">
                                            <i class="bi bi-{{ $platform }}"></i>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('profile') }}"><button class="nav-link">Change Email &
                                            Password</button></a>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Bio</h5>
                                    <p class="small fst-italic">{{ $user->name }}</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 label">Full Name</div>
                                        <div class="col-lg-9">{{ $user->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 label">Date of Birth</div>
                                        <div class="col-lg-9">{{ $user->date_of_birth }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 label">Gender</div>
                                        <div class="col-lg-9">{{ $user->gender }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 label">Address</div>
                                        <div class="col-lg-9">{{ $user->address }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 label">Phone</div>
                                        <div class="col-lg-9">{{ $user->phone_number }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 label">Email</div>
                                        <div class="col-lg-9">{{ $user->email }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('profile-details.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Photo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <!-- Image Preview -->
                                                <img id="profileImagePreview"
                                                    src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-profile.png') }}"
                                                    alt="Profile" class="rounded-circle"
                                                    style="width: 150px; height: 150px; object-fit: cover;">

                                                <div class="pt-2">
                                                    <!-- Trigger Upload -->
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"
                                                        onclick="document.getElementById('profile_photo').click();">
                                                        <i class="bi bi-upload"></i>
                                                    </a>
                                                </div>

                                                <!-- Hidden File Input -->
                                                <input type="file" name="profile_photo" id="profile_photo" class="d-none"
                                                    onchange="previewProfileImage(event)">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Bio" class="col-md-4 col-lg-3 col-form-label">Bio</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="bio" class="form-control" id="bio" style="height: 100px">{{ $user->bio }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Dob" class="col-md-4 col-lg-3 col-form-label">Date of
                                                Birth</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="date_of_birth" type="date" class="form-control"
                                                    id="dob"
                                                    value="{{ $user->date_of_birth ? date('Y-m-d', strtotime($user->date_of_birth)) : '' }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="gender" type="text" class="form-control" id="gender"
                                                    value="{{ $user->gender }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="address"
                                                    value="{{ $user->address }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone_number" type="text" class="form-control"
                                                    id="Phone" value="{{ $user->phone_number }}">
                                            </div>
                                        </div>

                                        {{-- <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div> --}}

                                        <div class="row mb-3">
                                            <label for="Social Links" class="col-md-4 col-lg-3 col-form-label">Social
                                                Links</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="social_links" class="form-control" id="bio" style="height: 100px">{{ $user->social_links }}</textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                {{-- <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('password.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                    <!-- End Change Password Form -->

                                </div> --}}

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>

            <script>
                // Function to preview the uploaded image
                function previewProfileImage(event) {
                    const file = event.target.files[0]; // Get the selected file
                    if (file) {
                        const reader = new FileReader(); // Create a FileReader to read the file
                        reader.onload = function(e) {
                            // Set the image source to the file content
                            document.getElementById('profileImagePreview').src = e.target.result;
                        };
                        reader.readAsDataURL(file); // Read the file as a data URL
                    }
                }
            </script>
        </section>

    </main><!-- End #main -->
@endsection