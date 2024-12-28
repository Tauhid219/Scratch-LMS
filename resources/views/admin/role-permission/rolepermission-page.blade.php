@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        @include('admin.role-permission.nav-links')

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <h1>Welcome to Role and Permission Management using Spatie</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
