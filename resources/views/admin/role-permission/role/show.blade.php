@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        @include('admin.role-permission.nav-links')

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Role List
                                <a href="{{ url('role') }}" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="container">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permissions:</strong>
                                    @if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->name }},</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
