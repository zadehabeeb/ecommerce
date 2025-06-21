@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Subcategories</h1>
        <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Add New Subcategory</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>
                            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
