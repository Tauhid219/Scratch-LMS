@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1>Edit Language</h1>

            <form action="{{ route('languages.update', $language) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code" class="form-control"
                        value="{{ old('code', $language->code) }}" required>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $language->name) }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>

    </main><!-- End #main -->
@endsection
