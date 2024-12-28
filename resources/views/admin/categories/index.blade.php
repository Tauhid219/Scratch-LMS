@extends('admin.adminlayout')
@section('main-content')
    <main id="main" class="main">

        <div class="container">
            <h1 class="mb-4">Categories</h1>
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-4">Create New Category</a>

            @if ($categories->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('category.destroy', $category) }}" method="POST"
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

                {{ $categories->links() }}
            @else
                <p>No categories available.</p>
            @endif
        </div>

    </main><!-- End #main -->
@endsection
