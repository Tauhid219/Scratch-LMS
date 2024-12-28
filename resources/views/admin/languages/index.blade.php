@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1 class="mb-4">Languages</h1>
            <a href="{{ route('languages.create') }}" class="btn btn-primary mb-4">Create New Language</a>

            @if ($languages->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->code }}</td>
                                <td>{{ $language->name }}</td>
                                <td>
                                    <a href="{{ route('languages.edit', $language) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('languages.destroy', $language) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                {{ $languages->links() }}
            @else
                <p>No languages available.</p>
            @endif
        </div>

    </main><!-- End #main -->
@endsection
