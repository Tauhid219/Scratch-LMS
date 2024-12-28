@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>Role: {{ $role->name }}
                                <a href="{{ url('role') }}" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('givePermissionToRole', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    @error('permission')
                                        <span class="text-danger">{{ message }}</span>
                                    @enderror
                                    <label for="">Permissions</label>
                                    <div class="row">
                                        @foreach ($permission as $permission)
                                            <div class="col-md-2">
                                                <label for="">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permission->name }}"
                                                        {{ in_array($permission->id, $rolepermission) ? 'checked' : '' }}>
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
