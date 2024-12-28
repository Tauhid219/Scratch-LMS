@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1 class="mb-4">Create New Category</h1>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Category</button>
            </form>
        </div>

    </main><!-- End #main -->
@endsection
